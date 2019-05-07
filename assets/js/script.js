$(document).ready(function () {
    $(document).on('click', '.btnEliminarPregunta', function () {
        debugger
        var id = $(this).data('id');
        var confirmacion = confirm("Está seguro que desea eliminar?");
        if (!confirmacion)
            return false;
        $.ajax({
            url: 'index.php?task=delete',
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                $('#dv' + data).remove();
            },
            error: function (jqXHR) {

            }
        });
    });
    $(document).on('click', '.btnEliminarRespuesta', function () {
        var id = $(this).data('id');
        var confirmacion = confirm("Está seguro que desea eliminar?");
        if (!confirmacion)
            return false;
        $.ajax({
            url: 'index.php?task=deleteRespuesta',
            method: 'POST',
            data: {
                id: id
            },
            success: function (data) {
                $('#dr' + data).remove();
            },
            error: function (jqXHR) {

            }
        });

    });
    $('#formPregunta').on('submit', function () {
        $.ajax({
            url: 'index.php?task=insert',
            method: 'POST',
            data: {
                nombre: $('#txtNombre').val(),
                pregunta: $('#txtPregunta').val()
            },
            success: function (data) {
                console.log(data);
                var objPregunta = JSON.parse(data);
                $('#modalformPregunta').modal('hide');
                var trPlantilla = $('#franz').clone();
                var html = trPlantilla.html();
                html = html.replace('{delete}', objPregunta.id);
                html = html.replace('{valor}', objPregunta.id);
                html = html.replace('{pregunta}', objPregunta.pregunta);
                $('#prContainer').append(html);
                $('#formPregunta')[0].reset();

            },
            error: function (jqXHR) {

            }
        });
        return false;
    });
    $('#formRespuesta').on('submit', function () {
        let urlParams = new URLSearchParams(window.location.search);
        let myParam = urlParams.get('id');
        $.ajax({
            url: 'index.php?task=insertRespuesta',
            method: 'POST',
            data: {
                nombre: $('#txtNombres').val(),
                respuesta: $('#txtRespuesta').val(),
                fkpregunta: myParam
            },
            success: function (data) {
                console.log(data);
                var objRespuesta = JSON.parse(data);
                $('#modalformRespuesta').modal('hide');
                var trPlantilla = $('#rPlantilla').clone();
                var html = trPlantilla.html();
                html = html.replace('{valor}', objRespuesta.id);
                html = html.replace('{delete}', objRespuesta.id);
                html = html.replace('{nombre}', objRespuesta.nombre);
                html = html.replace('{respuesta}', objRespuesta.respuesta);
                $('#respuestas').append(html);
                $('#formRespuesta')[0].reset();

            },
            error: function (jqXHR) {

            }
        });
        return false;
    });
    $('.btnEditarPersona').on('click', function () {
        var id = $(this).data('id');
        $.ajax({
            url: 'index.php?task=get',
            method: 'GET',
            data: {
                id: id
            },
            success: function (data) {
                var objPregunta = JSON.parse(data);
                $('#metodo').val('edit');
                $('#txtNombres').val(objPregunta.nombres);
                $('#txtApellidos').val(objPregunta.apellidos);
                $('#txtEdad').val(objPregunta.edad);
                $('#txtFecha').val(objPregunta.fechaNacimiento);
                $('#lstSexo').val(objPregunta.sexo);
                $('#hdnIdPersona').val(objPregunta.id);
                $('#modalFormPersona').modal('show');

            },
            error: function (jqXHR) {

            }
        });
        return false;
    });

    $('.btnMostrarDatos').on('click', function () {
        var btnClickeado = $(this);
        var id = btnClickeado.data('id');
        console.log(id);
        $.ajax({
            method: "GET",
            url: 'index.php?task=mostrarDatos&id=' + id,
            success: function (e) {
                console.log(e);
                var objPregunta = JSON.parse(e);
                alert('Nombre: ' + objPregunta.nombres +
                    "\nId: " + objPregunta.id +
                    "\nApellido: " + objPregunta.apellidos +
                    "\nEdad: " + objPregunta.edad +
                    "\nSexo: " + objPregunta.sexo +
                    "\nfechaNacimiento: " + objPregunta.fechaNacimiento
                );
            },
            error: function (e) {

            }
        });
        return false;
    });

});
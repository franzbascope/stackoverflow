<div class="modal" tabindex="-1" role="dialog" id="modalformPregunta">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formPregunta" action="index.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title">Formulario Pregunta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <input type="hidden" id="metodo" value="insert"/>
                    <input type="hidden" id="hdnIdPersona"/>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input class="form-control" type="text" id="txtNombre" required="required"/>
                    </div>
                    <div class="form-group">
                        <label>Pregunta:</label>
                        <input class="form-control" type="text" id="txtPregunta"  required="required" />
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>




<!-- Modal para ingresar respuesta -->

<div class="modal" tabindex="-1" role="dialog" id="modalformRespuesta">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="formRespuesta" action="index.php" method="POST">
            <div class="modal-header">
                <h5 class="modal-title">Formulario Respuesta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <input type="hidden" id="metodo" value="insert"/>
                    <input type="hidden" id="hdnIdPersona"/>
                    <div class="form-group">
                        <label>Nombre:</label>
                        <input class="form-control" type="text" id="txtNombres" required="required"/>
                    </div>
                    <div class="form-group">
                        <label>Respuesta:</label>
                        <input class="form-control" type="text" id="txtRespuesta"  required="required" />
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>











<script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/script.js" type="text/javascript"></script>

</body>
</html>

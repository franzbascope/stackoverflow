
<?php include_once './header.php';?>

<div class="container">
    <div class="col-md-6 offset-md-3">
        <h1>
            Insertar Pregunta
        </h1>
        <form action="index.php" method="POST">
            <input type="hidden" name="task" value="insert"/>
            <div class="form-group">
                <label>Quien eres?</label>
                <input class="form-control" type="text" name="txtNombre" required="required" value=""/>
            </div>
            <div class="form-group">
                <label>Cual es tu pregunta?</label>
                <input class="form-control" type="text" name="txtPregunta"  required="required" value=""/>
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Enviar"/>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>

    </div>
</div>
<?php include_once 'footer.php';?>
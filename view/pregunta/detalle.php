<?php include_once './header.php';?>



<div class="container">
    <div class="row">
        <div id="prContainer" class="col-md-9 border-bottom mt-2 p-0">
                <button type="button" class="btn btn-success m-2 float-right " data-toggle="modal" data-target="#modalformRespuesta">Responde</button>
            <h2>
                <?php echo $objPregunta->pregunta ?>
            </h2>
            <p class="float-left m-2">
                <?php echo $objPregunta->nombre ?>
            </p>
        </div>
        <div class="container">
        <div id="respuestas" class="row">
        <?php foreach ($listaRespuestas as $objRespuesta) {?>

        <div id="dr<?php echo $objRespuesta->id ?>" class="col-md-9  border-bottom  mt-2   ">
        <div class="ml-5">
        <a href="javascript:void(0)"  data-id="<?php echo $objRespuesta->id ?>" class="btnEliminarRespuesta">
                        <i class="far fa-trash-alt float-right m-2 mt-3 btn btn-danger"></i>
                    </a>
        <p>
                <?php echo $objRespuesta->respuesta ?>
            </p>
            <p class="float-left  text-secondary">
                <?php echo $objRespuesta->nombre ?>
            </p>
        </div>

        </div>
        <?php }?>

        </div>
        </div>


    <div id="rPlantilla" class="d-none">
        <div id="dr{delete}" class="col-md-9  border-bottom  mt-2 ">
        <div class="ml-5">
        <a href="javascript:void(0)"  data-id="{valor}" class="btnEliminarRespuesta">
                        <i class="far fa-trash-alt float-right m-2 mt-3 btn btn-danger"></i>
                    </a>
            <p>{respuesta}</p>
            <p class="float-left  text-secondary">{nombre}</p>
            </div>
        </div>
        </div>
    </div>



</div>
<?php include_once './footer.php';?>
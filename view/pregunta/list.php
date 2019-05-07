<?php include_once './header.php';?>



<div class="container">
    <div class="row">
        <div id="prContainer" class="col-md-9 border m-0 p-0">
            <button type="button" class="btn btn-primary float-right m-2" data-toggle="modal" data-target="#modalformPregunta">Ask Question</button>
            <h1 class="text-center">Top Questions</h1>

             <?php
foreach ($listaPreguntas as $objPregunta) {
    ?>
            <div  class="col-md-12 border border-left-0 border-right-0 " id="dv<?php echo $objPregunta->id ?>">
            <a href="javascript:void(0)" data-id="<?php echo $objPregunta->id ?>" class="btnEliminarPregunta">
            <i class="far fa-trash-alt float-right m-2 mt-3 btn btn-danger"></i>
            </a>
                 <a href="index.php?task=getRespuestas&id=<?php echo $objPregunta->id ?>">
                 <p class="text-primary p-2"> <?php echo $objPregunta->pregunta ?> </p>
                 </a>

            </div>
            <?php
}
?>
        <div id="franz"  style="display:none">
                <div   class="col-md-12 border border-left-0 border-right-0  ">
                    <a href="#" data-id="{delete}" class="btnEliminarPregunta">
                        <i class="far fa-trash-alt float-right m-2 mt-3 btn btn-danger"></i>
                    </a>
                    <a href="index.php?task=getRespuestas&id={valor}">
                    <p class="text-primary p-2"> {pregunta} </p>
                    </a>

                </div>

        </div>




    </div>
</div>
<?php include_once './footer.php';?>
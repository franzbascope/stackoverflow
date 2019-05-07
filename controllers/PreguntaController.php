<?php

class PreguntaController
{

    public static function insert()
    {
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["pregunta"])) {

            $nombre = $_REQUEST["nombre"];
            $pregunta = $_REQUEST["pregunta"];
            $preguntaBLL = new PreguntaBLL();
            $id = $preguntaBLL->insert($nombre, $pregunta);
            $objPregunta = $preguntaBLL->selectById($id);
            echo json_encode($objPregunta);
        }
    }

    public static function delete()
    {
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $preguntaBLL = new PreguntaBLL();
            $preguntaBLL->delete($id);
            echo $id;
        }
    }

    public static function index()
    {
        $preguntaBLL = new PreguntaBLL();
        $listaPreguntas = $preguntaBLL->selectAll();
        include_once 'view/pregunta/list.php';
    }

    public static function getRespuestas()
    {
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $preguntaBLL = new PreguntaBLL();
            $respuestaBLL = new RespuestaBLL();
            $objPregunta = $preguntaBLL->selectById($id);
            $listaRespuestas = $respuestaBLL->selectByPregunta($id);
            include_once 'view/pregunta/detalle.php';

        }

    }

    public static function form()
    {
        $preguntaBLL = null;
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $preguntaBLL = new PreguntaBLL();
            $objPregunta = $preguntaBLL->selectById($id);
        }
        include_once 'view/pregunta/edit.php';
    }

    public static function get()
    {

        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $preguntaBLL = new PreguntaBLL();
            $objPregunta = $preguntaBLL->selectById($id);
            echo json_encode($objPregunta);
        }
    }

}

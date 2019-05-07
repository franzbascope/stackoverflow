<?php

class RespuestaController
{

    public static function insert()
    {
        if (isset($_REQUEST["nombre"]) && isset($_REQUEST["respuesta"]) && isset($_REQUEST["fkpregunta"])) {

            $nombre = $_REQUEST["nombre"];
            $respuesta = $_REQUEST["respuesta"];
            $fkpregunta = $_REQUEST["fkpregunta"];
            $respuestaBll = new RespuestaBll();
            $id = $respuestaBll->insert($nombre, $respuesta,intval($fkpregunta));
            $objRespuesta = $respuestaBll->selectById($id);
            echo json_encode($objRespuesta);
        }
    }

    public static function delete()
    {
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $respuestaBll = new RespuestaBll();
            $respuestaBll->delete($id);
            echo $id;
        }
    }

    public static function index()
    {
        $respuestaBll = new respuestaBll();
        $listaPreguntas = $respuestaBll->selectAll();
        include_once 'view/pregunta/list.php';
    }

    public static function form()
    {
        $respuestaBll = null;
        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $respuestaBll = new RespuestaBll();
            $objRespuesta = $respuestaBll->selectById($id);
        }
        include_once 'view/respuesta/edit.php';
    }

    public static function get()
    {

        if (isset($_REQUEST["id"])) {
            $id = $_REQUEST["id"];
            $respuestaBll = new RespuestaBll();
            $objRespuesta = $respuestaBll->selectById($id);
            echo json_encode($objRespuesta);
        }
    }

    public static function save()
    {

        if (isset($_REQUEST["metodo"])) {
            $metodo = $_REQUEST["metodo"];
            switch ($metodo) {
                case "insert":
                    RespuestaController::insert();
                    break;

            }
        }
    }

}

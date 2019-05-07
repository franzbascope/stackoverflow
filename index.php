<?php
include_once './BD/DAL/Connection.php';
include_once './BD/BLL/PreguntaBLL.php';
include_once './BD/BLL/RespuestaBLL.php';
include_once './models/Pregunta.php';
include_once './models/Respuesta.php';
include_once './controllers/PreguntaController.php';
include_once './controllers/RespuestaController.php';

$task = "list";
if (isset($_REQUEST["task"])) {
    $task = $_REQUEST["task"];
}

switch ($task) {
    case "insert":
        PreguntaController::insert();
        break;
    case "insertRespuesta":
        RespuestaController::insert();
        break;
    case "getRespuestas":
        PreguntaController::getRespuestas();
        break;
    case "update":
        PreguntaController::update();
        break;
    case "delete":
        PreguntaController::delete();
        break;
    case "deleteRespuesta":
        RespuestaController::delete();
        break;
    case "search":
        RespuestaController::search();
        break;
    case "form":
        PreguntaController::form();
        break;
    case "mostrarDatos":
        PreguntaController::mostrarDatos();
        break;
    case "get":
        PreguntaController::get();
        break;
    case "save":
        PreguntaController::save();
        break;
    default:
        PreguntaController::index();
        break;
}

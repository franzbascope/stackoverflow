<?php

/**
 * Description of RespuestaBLL
 *
 * @author jmacb
 */
class RespuestaBLL
{

    private $tableName = "tbl_respuesta";

    public function insert($nombre, $respuesta,$fkpregunta)
    {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
             CALL usp_respuesta_insert
                (:pnombre,
                :prespuesta,
                :pfkpregunta)", array(
            ":pnombre" => $nombre,
            ":prespuesta" => $respuesta,
            ":pfkpregunta" => $fkpregunta,
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $ultimoId = $row["ultimoId"];
        return $ultimoId;
    }

    public function selectById($id)
    {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
            CALL usp_respuesta_selectById
                (:pid)", array(
            ":pid" => $id,
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objRespuesta = $this->rowToDto($row);
        return $objRespuesta;
    }

    public function selectByPregunta($id)
    {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
            CALL usp_respuesta_selectByPregunta
                (:pid)", array(
            ":pid" => $id,
        ));
        $listaRespuestas = array();

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objRespuesta = $this->rowToDto($row);
            $listaRespuestas[] = $objRespuesta;
        }

        return $listaRespuestas;
    }

    public function delete($id)
    {
        $objConexion = new Connection();
        $objConexion->queryWithParams("
            CALL usp_respuesta_delete
                (:pid)", array(
            ":pid" => $id,
        ));
    }

    public function rowToDto($row)
    {
        $objRespuesta = new Respuesta();
        $objRespuesta->id = ($row["id"]);
        $objRespuesta->nombre = ($row["nombre"]);
        $objRespuesta->respuesta = ($row["respuesta"]);
        return $objRespuesta;
    }

}

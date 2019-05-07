<?php

/**
 * Description of PersonaBLL
 *
 * @author jmacb
 */
class PreguntaBLL
{

    private $tableName = "tbl_pregunta";

    public function insert($nombre, $pregunta)
    {
        $objConexion = new Connection();
        $res = $objConexion->queryWithParams("
             CALL usp_pregunta_insert
                (:pnombre,
                :ppregunta)", array(
            ":pnombre" => $nombre,
            ":ppregunta" => $pregunta,
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
            CALL usp_pregunta_selectById
                (:pid)", array(
            ":pid" => $id,
        ));
        if ($res->rowCount() == 0) {
            return null;
        }
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $objPregunta = $this->rowToDto($row);
        return $objPregunta;
    }

    public function selectAll()
    {
        $objConexion = new Connection();
        $res = $objConexion->query("
            CALL usp_pregunta_select");
        $listaPreguntas = array();

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $objPregunta = $this->rowToDto($row);
            $listaPreguntas[] = $objPregunta;
        }

        return $listaPreguntas;
    }

    public function delete($id)
    {
        $objConexion = new Connection();
        $objConexion->queryWithParams("
            CALL usp_pregunta_delete
                (:pid)", array(
            ":pid" => $id,
        ));
    }

    public function rowToDto($row)
    {
        $objPregunta = new Pregunta();
        $objPregunta->id = ($row["id"]);
        $objPregunta->nombre = ($row["nombre"]);
        $objPregunta->pregunta = ($row["pregunta"]);
        return $objPregunta;
    }

}

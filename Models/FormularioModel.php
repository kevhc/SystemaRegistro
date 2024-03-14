<?php
class FormularioModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }



    public function getFormulario()
    {
        // Consulta para obtener los datos del formulario junto con el nombre del certificado
        $sql = "SELECT h.*,GROUP_CONCAT(c.certificado) FROM formulario h INNER JOIN  certificado c ON FIND_IN_SET(c.id, h.certificado) > 0
        GROUP BY h.id";

        // Ejecutar la consulta y devolver los resultados
        return $this->selectAll($sql);
    }


    public function delete($id)
    {
        $sql = "UPDATE formulario SET estado = ? WHERE id = ?";
        $datos = array(0, $id);
        return $this->save($sql, $datos);
    }



}
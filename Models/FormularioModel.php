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
        $sql = "SELECT h.*, p.nombre, GROUP_CONCAT(c.certificado SEPARATOR ', ') AS certificados
        FROM formulario h 
        INNER JOIN productores p ON h.id_productor = p.id 
        LEFT JOIN certificado c ON FIND_IN_SET(c.id, h.certificado)
        WHERE h.estado = 1
        GROUP BY h.id;";

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
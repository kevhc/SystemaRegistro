<?php
class AdminModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getTotalUsuarios()
    {
        $sql = "SELECT * FROM usuarios WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getTotalProductores()
    {
        $sql = "SELECT * FROM productores WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getTotalCertificados()
    {
        $sql = "SELECT * FROM certificado WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getTotalPreguntas()
    {
        $sql = "SELECT * FROM preguntas WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getUltimaConexion()
    {
        $sql = "SELECT usuario, ultima_conexion FROM usuarios ORDER BY ultima_conexion DESC LIMIT 4";
        return $this->selectAll($sql);
    }

    public function ConteoPastel()
    {
        $sql = "SELECT opcion, COUNT(opcion) AS conteo
        FROM respuesta
        GROUP BY opcion";
        return $this->selectAll($sql);
    }

    public function ConteoFormulario()
    {
        $sql = "SELECT r.id_formulario,
        p.id_productor,
        pr.nombre,
        pr.apellido,
        SUM(CASE WHEN r.opcion = 'Si' THEN 1 ELSE 0 END) AS Si,
        SUM(CASE WHEN r.opcion = 'No' THEN 1 ELSE 0 END) AS No,
        SUM(CASE WHEN r.opcion = 'No Aplica' THEN 1 ELSE 0 END) AS No_Aplica
 FROM respuesta r
 INNER JOIN formulario p ON r.id_formulario = p.id
 INNER JOIN productores pr ON p.id_productor = pr.id
 GROUP BY r.id_formulario, p.id_productor, pr.nombre, pr.apellido
 LIMIT 3;";
        return $this->selectAll($sql);
    }

}
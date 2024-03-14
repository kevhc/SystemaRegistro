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


}
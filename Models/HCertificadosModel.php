<?php
class HCertificadosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getCertificados()
    {
        $sql = "SELECT h.* , u.nombre FROM h_certificados h INNER JOIN usuarios u ON h.user = u.id";
        return $this->selectAll($sql);
    }


}
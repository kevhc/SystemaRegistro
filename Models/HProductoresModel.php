<?php
class HProductoresModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductores()
    {
        $sql = "SELECT h.* , u.nombre FROM h_productores h INNER JOIN usuarios u ON h.user = u.id";
        return $this->selectAll($sql);
    }


}
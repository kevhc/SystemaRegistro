<?php
class HParcelasModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getParcelas()
    {
        $sql = "SELECT h.* , u.nombre FROM h_parcelas h INNER JOIN usuarios u ON h.user = u.id";
        return $this->selectAll($sql);
    }


}
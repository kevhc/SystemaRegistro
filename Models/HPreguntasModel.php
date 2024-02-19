<?php
class HPreguntasModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPreguntas()
    {
        $sql = "SELECT h.* , u.nombre FROM h_preguntas h INNER JOIN usuarios u ON h.user = u.id";
        return $this->selectAll($sql);
    }


}
<?php
class PrincipalModel extends Query
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuario($usuario)
    {

        return $this->select("SELECT * FROM usuarios WHERE usuario='$usuario'AND estado = 1");

    }
}

?>
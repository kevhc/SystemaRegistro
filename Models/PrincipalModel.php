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

    public function actualizarUltimoInicioSesion($usuarioId)
    {

        $sql = "UPDATE usuarios SET ultima_conexion = NOW() WHERE id = ?";
        $datos = array($usuarioId);
        return $this->save($sql, $datos);

    }

}

?>
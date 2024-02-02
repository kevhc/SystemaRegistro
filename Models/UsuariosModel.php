<?php
class UsuariosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarios($nombre, $apellido, $email, $usuario, $clave, $rol)
    {

        $sql = "INSERT INTO usuarios(nombre, apellido, email, usuario, clave, rol) VALUES (?,?,?,?,?,?)";

        $datos = array($nombre, $apellido, $email, $usuario, $clave, $rol);
        return $this->insertar($sql, $datos);

    }

    public function getVerificar($item, $nombre)
    {
        $sql = "SELECT id FROM usuarios WHERE $item = '$nombre'";
        return $this->select($sql);
    }

}
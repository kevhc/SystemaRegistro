<?php
class UsuariosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getRegistrar($nombre, $apellido, $email, $usuario, $clave, $rol)
    {

        $sql = "INSERT INTO usuarios(nombre, apellido, email, usuario, clave, rol) VALUES (?,?,?,?,?,?)";

        $datos = array($nombre, $apellido, $email, $usuario, $clave, $rol);
        return $this->insertar($sql, $datos);

    }

    public function getUsuarios()
    {
        $sql = "SELECT id,nombre, apellido, email, usuario, clave, rol,perfil FROM usuarios WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getVerificar($item, $nombre)
    {
        $sql = "SELECT id FROM usuarios WHERE $item = '$nombre'  AND estado = 1  ";
        return $this->select($sql);
    }



}
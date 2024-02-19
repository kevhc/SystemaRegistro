<?php
class UsuariosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($nombre, $apellido, $email, $usuario, $clave, $imgNombre, $rol)
    {

        $sql = "INSERT INTO usuarios(nombre, apellido, email, usuario, clave, rol,foto) VALUES (?,?,?,?,?,?,?)";

        $datos = array($nombre, $apellido, $email, $usuario, $clave, $rol, $imgNombre);
        return $this->insertar($sql, $datos);

    }

    public function getUsuarios()
    {
        $sql = "SELECT id,nombre, apellido, email, usuario, clave, rol,perfil,foto,fecha FROM usuarios WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getVerificar($item, $nombre, $id)
    {
        if ($id > 0) {

            $sql = "SELECT id FROM usuarios WHERE $item = '$nombre' AND id != $id AND estado = 1";


        } else {

            $sql = "SELECT id FROM usuarios WHERE $item = '$nombre'  AND estado = 1";

        }
        return $this->select($sql);
    }

    public function delete($id)
    {
        $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
        $datos = array(0, $id);
        return $this->save($sql, $datos);
    }


    public function getUsuario($id)
    {
        $sql = "SELECT id,nombre, apellido, email, usuario, clave,foto,rol,perfil,fecha FROM usuarios WHERE id = $id";
        return $this->select($sql);
    }

    public function modificar($nombre, $apellido, $email, $usuario, $rol, $imgNombre, $id_usuario)
    {

        $sql = "UPDATE usuarios SET nombre=?, apellido=?, email=?, usuario=?,foto=?,rol=? WHERE id = ?";

        $datos = array($nombre, $apellido, $email, $usuario, $rol, $imgNombre, $id_usuario);
        return $this->save($sql, $datos);

    }

}
?>
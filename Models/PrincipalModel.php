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

    public function obtenerRutaImagen($usuario)
    {
        $usuario_info = $this->getUsuario($usuario); // Obtener información del usuario
        if ($usuario_info && !empty($usuario_info['foto'])) {
            return $usuario_info['foto']; // Devolver la ruta de la imagen si existe
        } else {
            return false; // Devolver false si no se encuentra la imagen
        }
    }
}

?>
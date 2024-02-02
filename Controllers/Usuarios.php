<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Gestion de Usuarios';
        $data['script'] = 'Usuarios.js';
        $this->views->getView('Usuarios', 'index', $data);
    }

    public function registrar()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $rol = $_POST['rol'];


        if (empty($nombre) || empty($apellido) || empty($email) || empty($usuario) || empty($clave) || empty($rol)) {

            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');

        } else {

            //COMPROBAR SI EXISTE EL CORREO
            $verificarCorreo = $this->model->getVerificar('email', $email);

            if (empty($verificarCorreo)) {
                //COMPROBAR SI EXISTE EL USUARIO
                $verificarUsuario = $this->model->getVerificar('usuario', $usuario);

                if (empty($verificarUsuario)) {

                    $hash = password_hash($clave, PASSWORD_DEFAULT);
                    $data = $this->model->getUsuarios($nombre, $apellido, $email, $usuario, $hash, $rol);
                    if ($data > 0) {
                        $res = array('tipo' => 'success', 'mensaje' => 'USUARIO REGISTRADO');
                    } else {
                        $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  REGISTRAR');
                    }

                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El USUARIO YA EXISTE');
                }
            } else {
                $res = array('tipo' => 'warning', 'mensaje' => 'El CORREO YA EXISTE');
            }
        }

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }


}
<?php
class Principal extends Controller
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Iniciar Sesion';
        $this->views->getView('principal', 'index', $data);
    }

    //login
    public function validar()
    {
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $data = $this->model->getUsuario($usuario);

        if (!empty($data)) {

            if (password_verify($clave, $data['clave'])) {

                // Actualizar el registro del usuario en la base de datos
                $this->model->actualizarUltimoInicioSesion($data['id']);

                $_SESSION['id'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['rol'] = $data['rol'];
                $_SESSION['activo'] = true;


                $res = array('tipo' => 'success', 'mensaje' => 'Bienvenido al Sistema de Registro');
            } else {

                $res = array('tipo' => 'warning', 'mensaje' => 'La contraseña es Incorrecta');
            }
        } else {

            $res = array('tipo' => 'warning', 'mensaje' => 'El usuario no existe');
        }

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
    }


    public function salir()
    {
        session_unset();
        session_destroy();
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
        header('Location:' . BASE_URL);
    }


}
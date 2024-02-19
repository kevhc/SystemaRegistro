<?php
class Principal extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
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

                $_SESSION['id'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['email'] = $data['email'];
                $_SESSION['rol'] = $data['rol'];

                // Obtener la ruta de la imagen del usuario
                $ruta_imagen = $this->model->obtenerRutaImagen($usuario);
                if ($ruta_imagen) {
                    $_SESSION['foto'] = $ruta_imagen;
                } else {
                    // Si no se encuentra la imagen, puedes establecer una ruta predeterminada o dejar la sesión vacía
                    // $_SESSION['foto'] = 'ruta/a/imagen/default.jpg';
                    // $_SESSION['foto'] = '';
                }

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
        session_destroy();
        header('Location:' . BASE_URL);
    }
}
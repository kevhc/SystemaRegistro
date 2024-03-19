<?php
class Usuarios extends Controller
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: " . BASE_URL);
        }
        parent::__construct();
    }

    public function index()
    {
        $data['title'] = 'Gestion de Usuarios';
        $data['script'] = 'Usuarios.js';
        $this->views->getView('Usuarios', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getUsuarios();
        //concatenar dos palabras
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . BASE_URL . "Assets/images/usuarios/" . $data[$i]['foto'] . '" width="80">';

            if ($data[$i]['id'] == 1) {
                $data[$i]['acciones'] = '<a class="btn btn-primary"> SUPER ADMIN</a>';

            } else {

                $data[$i]['acciones'] = '<div>
            <button type="button" class="btn btn-primary" onclick="editar(' . $data[$i]['id'] . ')"><i class="ti ti-pencil" style="font-size: 23px;"></i></button>
            <button type="button" class="btn btn-dark" onclick="eliminar(' . $data[$i]['id'] . ')"><i class="ti ti-trash"style="font-size: 23px;"></i></button>
            </div>';
            }



            $data[$i]['nombres'] = $data[$i]['nombre'] . " " . $data[$i]['apellido'];
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $nombre = strClean($_POST['nombre']);
        $apellido = strClean($_POST['apellido']);
        $email = strClean($_POST['email']);
        $usuario = strClean($_POST['usuario']);
        $clave = strClean($_POST['clave']);
        $rol = strClean($_POST['rol']);
        $id_usuario = strClean($_POST['id_usuario']);

        $img = $_FILES['imagen'];
        $name = $img['name'];
        $fecha = date("YmdHis");
        $tmpName = $img['tmp_name'];

        if (empty($nombre) || empty($apellido) || empty($email) || empty($usuario) || empty($clave) || empty($rol)) {

            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');

        } else {

            if (!empty($name)) {

                $extension = pathinfo($name, PATHINFO_EXTENSION);
                $formatos_permitidos = array('png', 'jpeg', 'jpg');
                $extension = pathinfo($name, PATHINFO_EXTENSION);

                if (!in_array($extension, $formatos_permitidos)) {

                    $res = array('tipo' => 'warning', 'mensaje' => 'ARCHIVO NO PERMITIDO');

                } else {

                    $imgNombre = $fecha . ".jpg";
                    $destino = "Assets/images/usuarios/" . $imgNombre;
                }
            } else if (!empty($_POST['foto_actual']) && empty($name)) {

                $imgNombre = $_POST['foto_actual'];

            } else {
                $imgNombre = "peril.jpg";
            }

            if ($id_usuario == '') {
                //COMPROBAR SI EXISTE EL CORREO
                $verificarCorreo = $this->model->getVerificar('email', $email, 0);

                if (empty($verificarCorreo)) {
                    //COMPROBAR SI EXISTE EL USUARIO
                    $verificarUsuario = $this->model->getVerificar('usuario', $usuario, 0);

                    if (empty($verificarUsuario)) {

                        $hash = password_hash($clave, PASSWORD_DEFAULT);
                        $data = $this->model->registrar($nombre, $apellido, $email, $usuario, $hash, $imgNombre, $rol);
                        if ($data > 0) {
                            $res = array('tipo' => 'success', 'mensaje' => 'USUARIO REGISTRADO');
                            if (!empty($name)) {
                                move_uploaded_file($tmpName, $destino);
                            }
                        } else {
                            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  REGISTRAR');
                        }

                    } else {
                        $res = array('tipo' => 'warning', 'mensaje' => 'El USUARIO YA EXISTE');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El CORREO YA EXISTE');
                }
            } else {

                $imgDelete = $this->model->getUsuario($id_usuario);

                if (isset($imgDelete['foto']) && $imgDelete['foto'] != 'user-1.jpg') {
                    if (file_exists("Assets/images/usuarios/" . $imgDelete['foto'])) {
                        unlink("Assets/images/usuarios/" . $imgDelete['foto']);
                    }
                }
                $verificarCorreo = $this->model->getVerificar('email', $email, $id_usuario);

                if (empty($verificarCorreo)) {

                    $verificarUsuario = $this->model->getVerificar('usuario', $usuario, $id_usuario);

                    if (empty($verificarUsuario)) {

                        $hash = password_hash($clave, PASSWORD_DEFAULT);
                        $data = $this->model->modificar($nombre, $apellido, $email, $usuario, $imgNombre, $rol, $id_usuario);
                        if ($data == 1) {
                            if (!empty($name)) {
                                move_uploaded_file($tmpName, $destino);
                            }
                            $res = array('tipo' => 'success', 'mensaje' => 'USUARIO MODIFICADO');

                        } else {
                            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  MODIFICAR');
                        }

                    } else {
                        $res = array('tipo' => 'warning', 'mensaje' => 'El USUARIO YA EXISTE');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El CORREO YA EXISTE');
                }

            }


        }


        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function delete($id)
    {

        $data = $this->model->delete($id);

        if ($data == 1) {
            $res = array('tipo' => 'success', 'mensaje' => 'USUARIO DADO DE BAJA');

        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {

        $data = $this->model->getUsuario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();


    }

}
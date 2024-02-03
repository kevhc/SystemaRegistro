<?php
class Productores extends Controller
{
    public function __construct()
    {
        session_start();
        // if (empty($_SESSION['activo'])) {
        //     header("location: " . base_url);
        // }
        parent::__construct();
        // $id_user = $_SESSION['id_usuario'];
        // // verificacion del permiso 
        // $perm = $this->model->verificarPermisos($id_user, "area");
        // if (!$perm && $id_user != 1) {
        //     // no tines permiso 
        //     $this->views->getView($this, "permisos");
        //     exit;
        // }
    }
    public function index()
    {
        $data['title'] = 'Gestion de Usuarios';
        $data['script'] = 'Usuarios.js';
        $this->views->getView('Productores', 'index', $data);
    }
    // public function listar()
    // {
    //     $data = $this->model->getArea();

    //     for ($i = 0; $i < count($data); $i++) {
    //         if ($data[$i]['estado'] == 1) {
    //             $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
    //             $data[$i]['acciones'] = '<div>
    //             <button class="btn btn-primary" type="button" onclick="btnEditarArea(' . $data[$i]['id'] . ');"><i class="fa fa-pencil-square-o"></i></button>
    //             <button class="btn btn-danger" type="button" onclick="btnEliminarArea(' . $data[$i]['id'] . ');"><i class="fa fa-trash-o"></i></button>
    //             <div/>';
    //         } else {
    //             $data[$i]['estado'] = '<span class="badge badge-danger">Eliminado</span>';
    //             $data[$i]['acciones'] = '<div>
    //             <button class="btn btn-success" type="button" onclick="btnReingresarArea(' . $data[$i]['id'] . ');"><i class="fa fa-reply-all"></i></button>
    //             <div/>';
    //         }
    //     }





    //     echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    // public function editar($id)
    // {
    //     $data = $this->model->editArea($id);
    //     echo json_encode($data, JSON_UNESCAPED_UNICODE);
    //     die();
    // }

    // public function registrar()
    // {
    //     $nombre_area = strClean($_POST['nombre_area']);
    //     $descripcion_area = strClean($_POST['descripcion_area']);
    //     $usuario_activo = $_SESSION['id_usuario'];
    //     $id = strClean($_POST['id']);
    //     if (empty($nombre_area)) {
    //         $msg = array('msg' => 'El nombre de Area es requerido', 'icono' => 'warning');
    //     } else {
    //         if ($id == "") {
    //             //se guarda si id es vacio 
    //             $data = $this->model->insertarArea($nombre_area, $descripcion_area, $usuario_activo);
    //             if ($data == "ok") {
    //                 // guardar los datos en el historico de receta
    //                 $evento = "CREADO";
    //                 //consultar el id que acabamos de crear
    //                 $id_consulta = $this->model->IdArea($nombre_area);
    //                 $id = $id_consulta['id'];
    //                 // insertamos el evento en tabla historica
    //                 $data2 = $this->model->h_area($id, $nombre_area, $descripcion_area, $usuario_activo, $evento);
    //                 $msg = array('msg' => 'Area registrada', 'icono' => 'success');
    //             } else if ($data == "existe") {
    //                 $msg = array('msg' => 'La Area ya existe', 'icono' => 'warning');
    //             } else {
    //                 $msg = array('msg' => 'Error al registrar', 'icono' => 'error');
    //             }
    //         } else {
    //             // se actualiza si id tiene informacion
    //             $data = $this->model->actualizarArea($nombre_area, $descripcion_area, $usuario_activo, $id);
    //             if ($data == "modificado") {
    //                 // guardar los datos en el historico de receta}
    //                 $evento = "MODIFICADO";
    //                 $data2 = $this->model->h_area($id, $nombre_area, $descripcion_area, $usuario_activo, $evento);
    //                 $msg = array('msg' => 'Area modificado', 'icono' => 'success');
    //             } else if ($data == 2) {
    //                 $msg = array('msg' => 'ya existe una categoria con ese nombre', 'icono' => 'error');

    //             } else {
    //                 $msg = array('msg' => 'Error al modificar', 'icono' => 'error');
    //             }
    //         }
    //     }
    //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //     die();
    // }
    // public function eliminar($id)
    // {
    //     // primero debemos  consultar la informacion con el id que tenemos 
    //     //para obtenr todos los datos
    //     $data = $this->model->estadoArea(0, $id);
    //     if ($data == 1) {
    //         $msg = array('msg' => 'Area dado de baja', 'icono' => 'success');
    //     } else {
    //         $msg = array('msg' => 'Error al eliminar', 'icono' => 'error');
    //     }
    //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //     die();
    // }

    // public function reingresar($id)
    // {
    //     $data = $this->model->estadoArea(1, $id);
    //     if ($data == 1) {
    //         $msg = array('msg' => 'Area restaurada', 'icono' => 'success');
    //     } else if ($data == 2) {
    //         $msg = array('msg' => 'ya existe una Area con ese nombre', 'icono' => 'error');

    //     } else {
    //         $msg = array('msg' => 'Error al restaurar', 'icono' => 'error');
    //     }
    //     echo json_encode($msg, JSON_UNESCAPED_UNICODE);
    //     die();
    // }

}

?>
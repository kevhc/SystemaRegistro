<?php
class Formulario extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Gestion de Productores';
        $data['script'] = 'Formulario.js';
        $this->views->getView('Formulario', $data);
    }

    public function listar()
    {

        $data = $this->model->getProductores();
        //concatenar dos palabras
        for ($i = 0; $i < count($data); $i++) {

            $data[$i]['acciones'] = '<div>
            <button type="button" class="btn btn-primary" onclick="editar(' . $data[$i]['id'] . ')"><i class="ti ti-pencil" style="font-size: 23px;"></i></button>
            <button type="button" class="btn btn-dark" onclick="eliminar(' . $data[$i]['id'] . ')"><i class="ti ti-trash"style="font-size: 23px;"></i></button>
            </div>';

            $data[$i]['nombres'] = $data[$i]['nombre'] . " " . $data[$i]['apellido'];
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $nombre = strClean($_POST['nombre']);
        $apellido = strClean($_POST['apellido']);
        $dni = strClean($_POST['dni']);
        $sexo = strClean($_POST['sexo']);
        $caserio = strClean($_POST['caserio']);
        $distrito = strClean($_POST['distrito']);
        $provincia = strClean($_POST['provincia']);
        $region = strClean($_POST['region']);
        $estatus = strClean($_POST['estatus']);
        $telefono = strClean($_POST['telefono']);
        $longitud = strClean($_POST['longitud']);
        $latitud = strClean($_POST['latitud']);
        $altitud = strClean($_POST['altitud']);
        $id_productores = strClean($_POST['id_productores']);



        if (
            empty($nombre) || empty($apellido) || empty($dni) ||
            empty($sexo) || empty($caserio) || empty($distrito) || empty($provincia) ||
            empty($region) || empty($estatus) || empty($telefono) || empty($longitud) || empty($latitud)
            || empty($altitud)
        ) {

            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');

        } else {

            if ($id_productores == '') {
                //COMPROBAR SI EXISTE EL CORREO
                $verificarDni = $this->model->getVerificar('dni', $dni, 0);

                if (empty($verificarDni)) {
                    //COMPROBAR SI EXISTE EL USUARIO
                    $verificarTelefono = $this->model->getVerificar('telefono', $telefono, 0);

                    if (empty($verificarTelefono)) {

                        $data = $this->model->registrar(
                            $nombre,
                            $apellido,
                            $dni,
                            $sexo,
                            $caserio,
                            $distrito,
                            $provincia,
                            $region,
                            $estatus,
                            $telefono,
                            $longitud,
                            $latitud,
                            $altitud
                        );
                        if ($data > 0) {
                            $res = array('tipo' => 'success', 'mensaje' => 'PRODUCTOR REGISTRADO');
                        } else {
                            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  REGISTRAR');
                        }

                    } else {
                        $res = array('tipo' => 'warning', 'mensaje' => 'El TELEFONO YA EXISTE');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El DNI YA EXISTE');
                }
            } else {

                $verificarDni = $this->model->getVerificar('dni', $dni, $id_productores);

                if (empty($verificarDni)) {

                    $verificarTelefono = $this->model->getVerificar('telefono', $telefono, $id_productores);

                    if (empty($verificarTelefono)) {

                        $data = $this->model->modificar(
                            $nombre,
                            $apellido,
                            $dni,
                            $sexo,
                            $caserio,
                            $distrito,
                            $provincia,
                            $region,
                            $estatus,
                            $telefono,
                            $longitud,
                            $latitud,
                            $altitud,
                            $id_productores
                        );
                        if ($data == 1) {
                            $res = array('tipo' => 'success', 'mensaje' => 'PRODUCTOR MODIFICADO');
                        } else {
                            $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  MODIFICAR');
                        }

                    } else {
                        $res = array('tipo' => 'warning', 'mensaje' => 'El TELEFONO YA EXISTE');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El DNI YA EXISTE');
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
            $res = array('tipo' => 'success', 'mensaje' => 'PRODUCTOR DADO DE BAJA');

        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {

        $data = $this->model->getProductor($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();


    }

}
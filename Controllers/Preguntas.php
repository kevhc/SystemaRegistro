<?php
class Preguntas extends Controller
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
        $data['title'] = 'Gestion de Preguntas';
        $data['script'] = 'Preguntas.js';
        $this->views->getView('Preguntas', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getPreguntas();
        //concatenar dos palabras
        for ($i = 0; $i < count($data); $i++) {



            $data[$i]['acciones'] = '<div>
            <button type="button" class="btn btn-primary" onclick="editar(' . $data[$i]['id'] . ')"><i class="ti ti-pencil" style="font-size: 23px;"></i></button>
            <button type="button" class="btn btn-dark" onclick="eliminar(' . $data[$i]['id'] . ')"><i class="ti ti-trash"style="font-size: 23px;"></i></button>
            </div>';
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function registrar()
    {
        $preguntas = strClean($_POST['preguntas']);
        $id_preguntas = strClean($_POST['id_preguntas']);
        $usuario_activo = $_SESSION['id'];

        if (empty($preguntas)) {

            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');

        } else {

            if ($id_preguntas == "") {

                //COMPROBAR SI EXISTE EL USUARIO
                $verificarPreguntas = $this->model->getVerificar('preguntas', $preguntas);

                if (empty($verificarPreguntas)) {

                    $data = $this->model->registrar($preguntas, $usuario_activo);
                    if ($data > 0) {

                        // guardar los datos en el historico de receta
                        $evento = "CREADO";
                        //consultar el id que acabamos de crear
                        $id_consulta = $this->model->IdPregunta($preguntas);
                        $id = $id_consulta['id'];

                        $data2 = $this->model->h_preguntas($id, $preguntas, $usuario_activo, $evento);


                        $res = array('tipo' => 'success', 'mensaje' => 'PREGUNTA REGISTRADA');
                    } else {
                        $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  REGISTRAR');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'LA PREGUNTA YA EXISTE');
                }

            } else {

                $verificarPreguntas = $this->model->getVerificar('preguntas', $preguntas, $id_preguntas);

                if (empty($verificarPreguntas)) {

                    $data = $this->model->modificar($preguntas, $usuario_activo, $id_preguntas);
                    if ($data == 1) {

                        $evento = "MODIFICADO";
                        $data2 = $this->model->h_preguntas($id_preguntas, $preguntas, $usuario_activo, $evento);

                        $res = array('tipo' => 'success', 'mensaje' => 'PREGUNTA MODIFICADA');
                    } else {
                        $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  MODIFICAR');
                    }

                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'LA PREGUNTA YA EXISTE');
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
            $res = array('tipo' => 'success', 'mensaje' => 'PREGUNTA DADO DE BAJA');

        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {

        $data = $this->model->getPregunta($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();


    }

}
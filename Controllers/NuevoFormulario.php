<?php
class NuevoFormulario extends Controller
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
        $data['title'] = 'Nuevo Formulario';
        $data['script'] = 'NuevoFormulario.js';
        $this->views->getView('Formulario', 'NuevoFormulario', $data);
    }

    public function buscarProductor()
    {
        if (isset($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarProductor($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function buscarCertificado()
    {
        if (isset($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarCertificado($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function buscarParcelas()
    {
        if (isset($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarParcelas($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }


    public function registrar()
    {
        $codigoGenerado = strClean($_POST['codigoGenerado']);
        $productor = strClean($_POST['productor']);
        $cumplimiento = strClean($_POST['cumplimiento']);
        $observaciones = strClean($_POST['observaciones']);
        $id_formulario = strClean($_POST['id_formulario']);
        $usuario_activo = $_SESSION['id'];

        // Certificados seleccionados, es un array
        $certificados = $_POST['certificados'];
        $parcelas = $_POST['parcelas'];

        // Convertir el array de certificados en una cadena para almacenarlo en la base de datos
        $certificados_string = implode(",", $certificados);
        $parcelas_string = implode(",", $parcelas);



        // Validar que los campos requeridos no estén vacíos
        if (
            empty($codigoGenerado) || empty($productor) || empty($certificados) ||
            empty($parcelas) || empty($cumplimiento) || empty($observaciones)
        ) {
            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');
        } else {
            if ($id_formulario == '') {
                //COMPROBAR SI EXISTE EL CORREO
                $data = $this->model->registrar(
                    $codigoGenerado,
                    $productor,
                    $certificados_string, // Usar la cadena de certificados
                    $parcelas_string,
                    $cumplimiento,
                    $observaciones,
                    $usuario_activo
                );
                if ($data > 0) {
                    $res = array('tipo' => 'success', 'mensaje' => 'FORMULARIO REGISTRADO');
                    // guardar los datos en el historico de receta
                    $evento = "CREADO";
                    //consultar el id que acabamos de crear
                    $id_consulta = $this->model->IdFormulario($codigoGenerado);
                    $id = $id_consulta['id'];
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL REGISTRAR');
                }
            } else {
                $data = $this->model->modificar(
                    $codigoGenerado,
                    $productor,
                    $certificados_string, // Usar la cadena de certificados
                    $parcelas_string,
                    $cumplimiento,
                    $observaciones,
                    $usuario_activo,
                    $id_formulario
                );
                if ($data == 1) {
                    $evento = "MODIFICADO";
                    $res = array('tipo' => 'success', 'mensaje' => 'PRODUCTOR MODIFICADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
                }
            }
        }

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }




}
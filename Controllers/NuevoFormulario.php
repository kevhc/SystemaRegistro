<?php
class NuevoFormulario extends Controller
{

    public function __construct()
    {
        session_start();
        if (empty ($_SESSION['activo'])) {
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
        if (isset ($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarProductor($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function buscarCertificado()
    {
        if (isset ($_GET['q'])) {
            $valor = $_GET['q'];
            $data = $this->model->buscarCertificado($valor);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function buscarParcelas()
    {
        if (isset ($_GET['q'])) {
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
        $id_formulario = strClean($_POST['id_formulario']);
        $usuario_activo = $_SESSION['id'];

        // Certificados seleccionados, es un array
        $certificados = $_POST['certificados'];
        $parcelas = $_POST['parcelas'];

        // Convertir el array de certificados en una cadena para almacenarlo en la base de datos
        $certificados_string = implode(",", $certificados);
        $parcelas_string = implode(",", $parcelas);

        // Obtener las opciones y observaciones para cada pregunta
        $opciones = $_POST['opciones'];
        $observaciones = $_POST['observaciones'];

        // Validar que los campos requeridos no estén vacíos
        if (
            empty ($codigoGenerado) || empty ($productor) || empty ($certificados) ||
            empty ($parcelas)
        ) {
            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');
        } else {
            // Verificar si se está registrando un nuevo formulario o modificando uno existente
            if ($id_formulario == '') {
                // Registrar un nuevo formulario
                $data = $this->model->registrar(
                    $codigoGenerado,
                    $productor,
                    $certificados_string, // Usar la cadena de certificados
                    $parcelas_string,
                    $usuario_activo
                );

                if ($data > 0) {
                    $res = array('tipo' => 'success', 'mensaje' => 'FORMULARIO REGISTRADO');

                    // Obtener el ID del formulario recién registrado
                    $id_formulario = $data;

                    // Guardar las opciones y observaciones para cada pregunta
                    foreach ($opciones as $index => $opcion) {
                        $observacion = $observaciones[$index];
                        $id_pregunta = $index;
                        $this->model->guardarRespuesta($id_formulario, $opcion, $observacion, $id_pregunta);
                    }
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL REGISTRAR');
                }
            } else {
                // Modificar un formulario existente
                $data = $this->model->modificar(
                    $codigoGenerado,
                    $productor,
                    $certificados_string, // Usar la cadena de certificados
                    $parcelas_string,
                    $usuario_activo,
                    $id_formulario
                );

                if ($data == 1) {
                    $res = array('tipo' => 'success', 'mensaje' => 'FORMULARIO MODIFICADO');

                    // Eliminar las opciones y observaciones existentes para este formulario
                    $this->model->eliminarRespuestas($id_formulario);

                    // Guardar las nuevas opciones y observaciones para cada pregunta
                    foreach ($opciones as $index => $opcion) {
                        $observacion = $observaciones[$index];
                        $this->model->guardarRespuesta($id_formulario, $opcion, $observacion);
                    }
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL MODIFICAR');
                }
            }
        }

        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function listar()
    {
        $data = $this->model->getPreguntas();
        // Concatenar dos palabras
        $opciones = array("si", "no", "no aplica");

        for ($i = 0; $i < count($data); $i++) {
            $radioButtons = '';
            foreach ($opciones as $opcion) {
                $radioButtons .= '<div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" id="opciones_' . $i . '" name="opciones[' . $i . ']" value="' . $opcion . '">
                    <label class="form-check-label">' . $opcion . '</label>
                </div>';
            }

            $data[$i]['id'] = '<div>' . $data[$i]['id'] . '</div>';
            $data[$i]['preguntas'] = '<div>' . $data[$i]['preguntas'] . '</div>';
            $data[$i]['opciones'] = '<div class="form-group">' . $radioButtons . '</div>';
            $data[$i]['observaciones'] = '<div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here"
                    id="observaciones_' . $i . '" name="observaciones[' . $i . ']" rows="10" cols="150"></textarea>
            </div>';
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {

        $data = $this->model->getEditarFormulario($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();


    }
}
<?php
class Certificados extends Controller
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
        $data['title'] = 'Gestion de Certificados';
        $data['script'] = 'Certificados.js';
        $this->views->getView('Certificados', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getCertificados();
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
        $certificado = strClean($_POST['certificado']);
        $id_certificado = strClean($_POST['id_certificado']);
        $usuario_activo = $_SESSION['id'];


        if (empty($certificado)) {

            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');

        } else {

            if ($id_certificado == "") {

                //COMPROBAR SI EXISTE EL USUARIO
                $verificarCertificado = $this->model->getVerificar('certificado', $certificado);

                if (empty($verificarCertificado)) {

                    $data = $this->model->registrar($certificado, $usuario_activo);
                    if ($data > 0) {

                        // guardar los datos en el historico de receta
                        $evento = "CREADO";
                        //consultar el id que acabamos de crear
                        $id_consulta = $this->model->IdCertificado($certificado);
                        $id = $id_consulta['id'];

                        $data2 = $this->model->h_certificados($id, $certificado, $usuario_activo, $evento);

                        $res = array('tipo' => 'success', 'mensaje' => 'CERTIFICADO REGISTRADO');
                    } else {
                        $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  REGISTRAR');
                    }
                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El CERTIFICADO YA EXISTE');
                }

            } else {

                $verificarCertificado = $this->model->getVerificar('certificado', $certificado, $id_certificado);

                if (empty($verificarCertificado)) {

                    $data = $this->model->modificar($certificado, $usuario_activo, $id_certificado);
                    if ($data == 1) {

                        $evento = "MODIFICADO";
                        $data2 = $this->model->h_certificados($id_certificado, $certificado, $usuario_activo, $evento);

                        $res = array('tipo' => 'success', 'mensaje' => 'CERTIFICADO MODIFICADO');
                    } else {
                        $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  MODIFICAR');
                    }

                } else {
                    $res = array('tipo' => 'warning', 'mensaje' => 'El CERTIFICADO YA EXISTE');
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
            $res = array('tipo' => 'success', 'mensaje' => 'CERTIFICADO DADO DE BAJA');

        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {

        $data = $this->model->getCertificado($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();


    }

}
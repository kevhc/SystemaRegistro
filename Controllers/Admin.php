<?php
class Admin extends Controller
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
        $data['title'] = 'Panel de Admin Sesion';
        $data['script'] = 'Admin.js';
        $this->views->getView('admin', 'home', $data);
    }

    public function TotalUsuarios()
    {
        $data = $this->model->getTotalUsuarios();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function TotalProductores()
    {
        $data = $this->model->getTotalProductores();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function TotalCertificados()
    {
        $data = $this->model->getTotalCertificados();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function TotalPreguntas()
    {
        $data = $this->model->getTotalPreguntas();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function UltimaConexion()
    {
        $data = $this->model->getUltimaConexion();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function ConteoPastel()
    {
        $data = $this->model->ConteoPastel();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function ConteoFormulario()
    {
        $data = $this->model->ConteoFormulario();

        // Itera sobre los resultados y agrega un campo "nombre_completo" que contenga el nombre y apellido concatenados
        foreach ($data as &$row) {
            $row['nombre_completo'] = $row['nombre'] . ' ' . $row['apellido'];
            // Elimina los campos de nombre y apellido si ya no son necesarios
            unset($row['nombre']);
            unset($row['apellido']);
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }



}
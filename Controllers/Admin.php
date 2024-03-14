<?php
class Admin extends Controller
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




}
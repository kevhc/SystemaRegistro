<?php
class HCertificados extends Controller
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
        $data['title'] = 'Historial de Certificados';
        $data['script'] = 'HCertificados.js';
        $this->views->getView('HCertificados', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getCertificados();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}
<?php
class HCertificados extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
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
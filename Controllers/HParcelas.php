<?php
class HParcelas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Historial de Parcelas';
        $data['script'] = 'HParcelas.js';
        $this->views->getView('HParcelas', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getParcelas();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}
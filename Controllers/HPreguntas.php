<?php
class HPreguntas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Historial de Preguntas';
        $data['script'] = 'HPreguntas.js';
        $this->views->getView('HPreguntas', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getPreguntas();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}
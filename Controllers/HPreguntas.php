<?php
class HPreguntas extends Controller
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
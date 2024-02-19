<?php
class HProductores extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Historial de Productores';
        $data['script'] = 'HProductores.js';
        $this->views->getView('HProductores', 'index', $data);
    }

    public function listar()
    {


        $data = $this->model->getProductores();

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['nombres'] = $data[$i]['nombre'] . " " . $data[$i]['apellido'];
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }


}
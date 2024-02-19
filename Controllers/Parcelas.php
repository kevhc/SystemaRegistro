<?php
class Parcelas extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function index()
    {
        $data['title'] = 'Gestion de Parcelas';
        $data['script'] = 'Parcelas.js';
        $this->views->getView('Parcelas', 'index', $data);
    }

    public function listar()
    {

        $data = $this->model->getParcelas();
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

        $dni = strClean($_POST['dni']);
        $finca = strClean($_POST['finca']);
        $caproduccion = strClean($_POST['caproduccion']);
        $cacrecimiento = strClean($_POST['cacrecimiento']);
        $purma = strClean($_POST['purma']);
        $bosque = strClean($_POST['bosque']);
        $llevar = strClean($_POST['llevar']);
        $paotros = strClean($_POST['paotros']);
        $hatotal = strClean($_POST['hatotal']);
        $Proanterior = strClean($_POST['Proanterior']);
        $Proestimada = strClean($_POST['Proestimada']);
        $lotes = strClean($_POST['lotes']);
        $has = strClean($_POST['has']);
        $edad = strClean($_POST['edad']);
        $proEstimada = strClean($_POST['proEstimada']);
        $caturra = strClean($_POST['caturra']);
        $pache = strClean($_POST['pache']);
        $catimor = strClean($_POST['catimor']);
        $catuai = strClean($_POST['catuai']);
        $typica = strClean($_POST['typica']);
        $borbon = strClean($_POST['borbon']);
        $otro = strClean($_POST['otro']);
        $id_parcelas = strClean($_POST['id_parcelas']);

        $usuario_activo = $_SESSION['id'];



        if (
            empty($dni)
        ) {

            $res = array('tipo' => 'warning', 'mensaje' => 'TODOS LOS CAMPOS SON REQUERIDOS');

        } else {

            if ($id_parcelas == '') {

                $data = $this->model->registrar(
                    $dni,
                    $finca,
                    $caproduccion,
                    $cacrecimiento,
                    $purma,
                    $bosque,
                    $llevar,
                    $paotros,
                    $hatotal,
                    $Proanterior,
                    $Proestimada,
                    $lotes,
                    $has,
                    $edad,
                    $proEstimada,
                    $caturra,
                    $pache,
                    $catimor,
                    $catuai,
                    $typica,
                    $borbon,
                    $otro,
                    $usuario_activo
                );
                if ($data > 0) {

                    // guardar los datos en el historico de receta
                    $evento = "CREADO";
                    //consultar el id que acabamos de crear
                    $id_consulta = $this->model->IdParcela($dni);
                    $id = $id_consulta['id'];

                    $data2 = $this->model->h_parcelas(
                        $id,
                        $dni,
                        $finca,
                        $caproduccion,
                        $cacrecimiento,
                        $purma,
                        $bosque,
                        $llevar,
                        $paotros,
                        $hatotal,
                        $Proanterior,
                        $Proestimada,
                        $lotes,
                        $has,
                        $edad,
                        $proEstimada,
                        $caturra,
                        $pache,
                        $catimor,
                        $catuai,
                        $typica,
                        $borbon,
                        $otro,
                        $usuario_activo,
                        $evento
                    );


                    $res = array('tipo' => 'success', 'mensaje' => 'USUARIO REGISTRADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  REGISTRAR');
                }


            } else {

                $data = $this->model->modificar(
                    $dni,
                    $finca,
                    $caproduccion,
                    $cacrecimiento,
                    $purma,
                    $bosque,
                    $llevar,
                    $paotros,
                    $hatotal,
                    $Proanterior,
                    $Proestimada,
                    $lotes,
                    $has,
                    $edad,
                    $proEstimada,
                    $caturra,
                    $pache,
                    $catimor,
                    $catuai,
                    $typica,
                    $borbon,
                    $otro,
                    $usuario_activo,
                    $id_parcelas
                );
                if ($data == 1) {

                    $evento = "MODIFICADO";

                    $data2 = $this->model->h_certificados(
                        $id_parcelas,
                        $dni,
                        $finca,
                        $caproduccion,
                        $cacrecimiento,
                        $purma,
                        $bosque,
                        $llevar,
                        $paotros,
                        $hatotal,
                        $Proanterior,
                        $Proestimada,
                        $lotes,
                        $has,
                        $edad,
                        $proEstimada,
                        $caturra,
                        $pache,
                        $catimor,
                        $catuai,
                        $typica,
                        $borbon,
                        $otro,
                        $usuario_activo,
                        $evento
                    );

                    $res = array('tipo' => 'success', 'mensaje' => 'USUARIO MODIFICADO');
                } else {
                    $res = array('tipo' => 'error', 'mensaje' => 'ERROR AL  MODIFICAR');
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
            $res = array('tipo' => 'success', 'mensaje' => 'PARCELA DADA DE BAJA');

        } else {
            $res = array('tipo' => 'warning', 'mensaje' => 'ERROR AL ELIMINAR');
        }
        echo json_encode($res, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function editar($id)
    {

        $data = $this->model->getParcela($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();


    }

}
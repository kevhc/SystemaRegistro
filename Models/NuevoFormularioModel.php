<?php
class NuevoFormularioModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function buscarProductor($valor)
    {
        $sql = "SELECT id, CONCAT(nombre, ' ', apellido) AS text 
        FROM productores 
        WHERE CONCAT(nombre, ' ', apellido) LIKE '%" . $valor . "%'  
        AND estado = 1 
        LIMIT 10;";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function buscarCertificado($valor)
    {
        $sql = "SELECT id,certificado AS text 
        FROM certificado
        WHERE certificado LIKE '%" . $valor . "%'  
        AND estado = 1 ";
        $data = $this->selectAll($sql);
        return $data;
    }

    public function buscarParcelas($valor)
    {
        $sql = "SELECT id, CONCAT(id, ' - ', dni) AS text 
        FROM parcelas 
        WHERE CONCAT(id, ' - ', dni) LIKE '%" . $valor . "%'  
        AND estado = 1 
        LIMIT 10;";
        $data = $this->selectAll($sql);
        return $data;
    }


    public function registrar($codigoGenerado, $productor, $certificados, $parcelas, $cumplimiento, $observaciones, $usuario_activo)
    {

        $sql = "INSERT INTO formulario(codigo,id_productor , certificado , parcelas , respuesta ,observaciones,estado,user_c,user_m) VALUES (?,?,?,?,?,?,1,?,?)";

        $datos = array($codigoGenerado, $productor, $certificados, $parcelas, $cumplimiento, $observaciones, $usuario_activo, $usuario_activo);
        return $this->insertar($sql, $datos);

    }

    public function IdFormulario($codigoGenerado)
    {
        $sql = "SELECT id FROM formulario WHERE codigo = '$codigoGenerado' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }




}
<?php
class CertificadosModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($certificado, $usuario_activo)
    {
        $sql = "INSERT INTO certificado(certificado,estado,user_c,user_m) VALUES (?,1,?,?)";

        $datos = array($certificado, $usuario_activo, $usuario_activo);
        return $this->insertar($sql, $datos);

    }

    public function getCertificados()
    {
        $sql = "SELECT * FROM certificado WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getVerificar($item, $certificado)
    {

        $sql = "SELECT id FROM certificado WHERE $item = '$certificado'  AND estado = 1";
        return $this->select($sql);
    }

    public function delete($id)
    {
        $sql = "UPDATE certificado SET estado = ? WHERE id = ?";
        $datos = array(0, $id);
        return $this->save($sql, $datos);
    }


    public function getCertificado($id)
    {
        $sql = "SELECT * FROM certificado WHERE id = $id";
        return $this->select($sql);
    }

    public function modificar($certificado, $usuario_activo, $id)
    {

        $sql = "UPDATE certificado SET certificado=? ,user_m = ? WHERE id = ?";

        $datos = array($certificado, $usuario_activo, $id);
        return $this->save($sql, $datos);

    }

    public function h_certificados($id, $certificado, $usuario_activo, $evento)
    {
        $query = "INSERT INTO h_certificados(certificado_id,certificado,user,evento) VALUES (?,?,?,?)";
        $datos = array($id, $certificado, $usuario_activo, $evento);
        $data = $this->save($query, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function IdCertificado($certificado)
    {
        $sql = "SELECT id FROM certificado WHERE certificado = '$certificado' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }


}
?>
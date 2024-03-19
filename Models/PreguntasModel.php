<?php
class PreguntasModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar($preguntas, $usuario_activo)
    {
        $sql = "INSERT INTO preguntas(preguntas,estado,user_c,user_m) VALUES (?,1,?,?)";

        $datos = array($preguntas, $usuario_activo, $usuario_activo);
        return $this->insertar($sql, $datos);

    }

    public function getPreguntas()
    {
        $sql = "SELECT * FROM preguntas WHERE estado = 1";
        return $this->selectAll($sql);

    }

    public function getVerificar($item, $preguntas)
    {

        $sql = "SELECT id FROM preguntas WHERE $item = '$preguntas'  AND estado = 1";
        return $this->select($sql);
    }

    public function delete($id)
    {
        $sql = "UPDATE preguntas SET estado = ? WHERE id = ?";
        $datos = array(0, $id);
        return $this->save($sql, $datos);
    }


    public function getPregunta($id)
    {
        $sql = "SELECT * FROM preguntas WHERE id = $id";
        return $this->select($sql);
    }

    public function modificar($preguntas, $usuario_activo, $id)
    {

        $sql = "UPDATE preguntas SET preguntas=?,user_m = ? WHERE id = ?";

        $datos = array($preguntas, $usuario_activo, $id);
        return $this->save($sql, $datos);

    }

    public function h_preguntas($id, $preguntas, $usuario_activo, $evento)
    {
        $query = "INSERT INTO h_preguntas(preguntas_id,preguntas,user,evento) VALUES (?,?,?,?)";
        $datos = array($id, $preguntas, $usuario_activo, $evento);
        $data = $this->save($query, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }
    public function IdPregunta($preguntas)
    {
        $sql = "SELECT id FROM preguntas WHERE preguntas = '$preguntas' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }


}
?>
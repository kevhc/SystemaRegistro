<?php
class ProductoresModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }

    public function registrar(
        $nombre,
        $apellido,
        $dni,
        $sexo,
        $caserio,
        $distrito,
        $provincia,
        $region,
        $estatus,
        $telefono,
        $longitud,
        $latitud,
        $altitud,
        $imgNombre,
        $usuario_activo
    ) {

        $sql = "INSERT INTO productores(nombre, apellido, dni, sexo,caserio,distrito,provincia,region,estatus,telefono,longitud,latitud,altitud,foto,estado,user_c,user_m) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,1,?,?)";

        $datos = array(
            $nombre,
            $apellido,
            $dni,
            $sexo,
            $caserio,
            $distrito,
            $provincia,
            $region,
            $estatus,
            $telefono,
            $longitud,
            $latitud,
            $altitud,
            $imgNombre,
            $usuario_activo,
            $usuario_activo
        );
        return $this->insertar($sql, $datos);
    }

    public function getProductores()
    {
        $sql = "SELECT id,nombre, apellido, dni, sexo, region, telefono,foto,fecha FROM productores WHERE estado = 1";
        return $this->selectAll($sql);
    }

    public function getVerificar($item, $nombre, $id)
    {
        if ($id > 0) {

            $sql = "SELECT id FROM productores WHERE $item = '$nombre' AND id != $id AND estado = 1";
        } else {

            $sql = "SELECT id FROM productores WHERE $item = '$nombre'  AND estado = 1";
        }
        return $this->select($sql);
    }

    public function delete($id)
    {
        $sql = "UPDATE productores SET estado = ? WHERE id = ?";
        $datos = array(0, $id);
        return $this->save($sql, $datos);
    }


    public function getProductor($id)
    {
        $sql = "SELECT id,nombre, apellido, dni, sexo,caserio,distrito,provincia,region,estatus,telefono,longitud,latitud,altitud,foto FROM productores WHERE id = $id";
        return $this->select($sql);
    }

    public function modificar(
        $nombre,
        $apellido,
        $dni,
        $sexo,
        $caserio,
        $distrito,
        $provincia,
        $region,
        $estatus,
        $telefono,
        $longitud,
        $latitud,
        $altitud,
        $imgNombre,
        $usuario_activo,
        $id_productores
    ) {

        $sql = "UPDATE productores SET nombre=?,apellido=?,dni=?,sexo=?,caserio=?,distrito=?,provincia=?,region=?,estatus=?,telefono=?,longitud=?,latitud=?,altitud=?,foto=?,user_m = ? WHERE id = ?";

        $datos = array(
            $nombre,
            $apellido,
            $dni,
            $sexo,
            $caserio,
            $distrito,
            $provincia,
            $region,
            $estatus,
            $telefono,
            $longitud,
            $latitud,
            $altitud,
            $imgNombre,
            $usuario_activo,
            $id_productores
        );
        return $this->save($sql, $datos);
    }

    public function h_productores(
        $id,
        $nombre,
        $apellido,
        $dni,
        $sexo,
        $caserio,
        $distrito,
        $provincia,
        $region,
        $estatus,
        $telefono,
        $longitud,
        $latitud,
        $altitud,
        $imgNombre,
        $usuario_activo,
        $evento
    ) {
        $query = "INSERT INTO h_productores(productor_id,nombre,apellido,dni,sexo,
        caserio,distrito,provincia,region,estatus,telefono,longitud,latitud,altitud,foto,user,evento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $datos = array(
            $id,
            $nombre,
            $apellido,
            $dni,
            $sexo,
            $caserio,
            $distrito,
            $provincia,
            $region,
            $estatus,
            $telefono,
            $longitud,
            $latitud,
            $altitud,
            $imgNombre,
            $usuario_activo,
            $evento
        );
        $data = $this->save($query, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }

    public function IdProductor($dni)
    {
        $sql = "SELECT id FROM productores WHERE dni = '$dni' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }



}
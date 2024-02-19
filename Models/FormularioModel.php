<?php
class FormularioModel extends Query
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
        $altitud
    ) {

        $sql = "INSERT INTO productores(nombre, apellido, dni, sexo,caserio,distrito,provincia,region,estatus,telefono,longitud,latitud,altitud,estado) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,1)";

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
            $altitud
        );
        return $this->insertar($sql, $datos);
    }

    public function getProductores()
    {
        $sql = "SELECT id,nombre, apellido, dni, sexo, region, telefono,fecha FROM productores WHERE estado = 1";
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
        $sql = "SELECT id,nombre, apellido, dni, sexo,caserio,distrito,provincia,region,estatus,telefono,longitud,latitud,altitud FROM productores WHERE id = $id";
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
        $id
    ) {

        $sql = "UPDATE productores SET nombre=?,apellido=?,dni=?,sexo=?,caserio=?,distrito=?,provincia=?,region=?,estatus=?,telefono=?,longitud=?,latitud=?,altitud=? WHERE id = ?";

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
            $id
        );
        return $this->save($sql, $datos);
    }
}
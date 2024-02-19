<?php
class ParcelasModel extends Query
{

    public function __construct()
    {
        parent::__construct();
    }


    public function registrar(

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
    ) {

        $sql = "INSERT INTO parcelas(dni,finca,cafe_pro,cafe_creci,purma,bosque,pan_llevar,pasto,ha_total,pro_anterior,
         pro_estimado,lote,ha,edad,pro_estimado2,caturra,pache,catimor,catuai,typica,borbon,otro,estado,user_c,user_m) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1,?,?)";

        $datos = array(
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
            $usuario_activo
        );
        return $this->insertar($sql, $datos);

    }

    public function getParcelas()
    {
        $sql = "SELECT id,dni,finca, cafe_pro, cafe_creci, ha_total, pro_anterior, pro_estimado,fecha FROM parcelas WHERE estado = 1";
        return $this->selectAll($sql);

    }



    public function delete($id)
    {
        $sql = "UPDATE parcelas SET estado = ? WHERE id = ?";
        $datos = array(0, $id);
        return $this->save($sql, $datos);
    }


    public function getParcela($id)
    {
        $sql = "SELECT id,dni,finca,cafe_pro,cafe_creci,purma,bosque,pan_llevar,pasto,ha_total,pro_anterior,
        pro_estimado,lote,ha,edad,pro_estimado2,caturra,pache,catimor,catuai,typica,borbon,otro FROM parcelas WHERE id = $id";
        return $this->select($sql);
    }

    public function modificar(
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
    ) {

        $sql = "UPDATE parcelas SET dni=?,finca=?,cafe_pro=?,cafe_creci=?,purma=?,bosque=?,pan_llevar=?,pasto=?,ha_total=?,pro_anterior=?,
        pro_estimado=?,lote=?,ha=?,edad=?,pro_estimado2=?,caturra=?,pache=?,catimor=?,catuai=?,typica=?,borbon=?,otro=?,user_m = ?  WHERE id = ?";

        $datos = array(
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
        return $this->save($sql, $datos);

    }

    public function h_parcelas(
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
    ) {
        $query = "INSERT INTO h_parcelas(parcelas_id,dni,finca,cafe_pro,cafe_creci,purma,bosque,pan_llevar,pasto,
        ha_total,pro_anterior,pro_estimado,lote,ha,edad,pro_estimado2,caturra,pache,catimor,catuai,typica,borbon,otro,user,evento) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $datos = array(
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
        $data = $this->save($query, $datos);
        if ($data == 1) {
            $res = "ok";
        } else {
            $res = "error";
        }
        return $res;
    }


    public function IdParcela($dni)
    {
        $sql = "SELECT id FROM parcelas WHERE dni = '$dni' AND estado=1";
        $res = $this->select($sql);
        return $res;
    }

}
?>
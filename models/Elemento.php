
<?php

class Elemento extends Conectar
{

    public function obtener_elementos()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT elementos.idElemento,
        elementos.fk_obra,
        elementos.numero_remito,
        elementos.fk_hormigon,
        elementos.fk_alarmas,
        elementos.fecha_hormigonado,
        elementos.fk_empresa,
        elementos.fk_dispositivo,
        elementos.elemento,
        elementos.hora,
        obras.nombreObra,
        obras.idObra,
        hormigon.tipo_hormigon,
        hormigon.idHormigon,
        alarmas.descripcion,
        alarmas.idAlarma,
        empresas.nombreEmpresa,
        empresas.idEmpresa,
        dispositivos.dispositivo,
        dispositivos.idDispositivo
        FROM elementos
        INNER JOIN obras ON elementos.fk_obra= obras.idObra
        INNER JOIN hormigon ON elementos.fk_hormigon= hormigon.idHormigon
        INNER JOIN alarmas ON elementos.fk_alarmas = alarmas.idAlarma
        INNER JOIN empresas ON elementos.fk_empresa = empresas.idEmpresa
        INNER JOIN dispositivos ON elementos.fk_dispositivo = dispositivos.idDispositivo
        WHERE elementos.estado = 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
     public function obtener_elementos_obras($fk_obra)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT elementos.idElemento,
        elementos.fk_obra,
        elementos.numero_remito,
        elementos.fk_hormigon,
        elementos.fk_alarmas,
        elementos.fecha_hormigonado,
        elementos.fk_empresa,
        elementos.fk_dispositivo,
        elementos.elemento,
        elementos.hora,
        obras.nombreObra,
        obras.idObra,
        hormigon.tipo_hormigon,
        hormigon.idHormigon,
        alarmas.descripcion,
        alarmas.idAlarma,
        empresas.nombreEmpresa,
        empresas.idEmpresa,
        dispositivos.dispositivo,
        dispositivos.idDispositivo
        FROM elementos
        INNER JOIN obras ON elementos.fk_obra= obras.idObra
        INNER JOIN hormigon ON elementos.fk_hormigon= hormigon.idHormigon
        INNER JOIN alarmas ON elementos.fk_alarmas = alarmas.idAlarma
        INNER JOIN empresas ON elementos.fk_empresa = empresas.idEmpresa
        INNER JOIN dispositivos ON elementos.fk_dispositivo = dispositivos.idDispositivo
        WHERE elementos.estado = 1
        AND elementos.fk_obra = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $fk_obra);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function insertar_elementos(
   
    $numero_remito,
    $elemento,
    $fk_obra,
    $fk_empresa,
    $fk_hormigon,
    $fk_alarmas,
    $fk_dispositivo,
    $hora,
    $fecha_hormigonado,
    $fk_sensor
   )
    {
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO elementos (
            idElemento,
            numero_remito,
            elemento,
            fk_obra,
            fk_empresa,
            estado,
            fk_hormigon,
            fk_alarmas,
            fk_dispositivo,
            hora,
            fecha_hormigonado,
            fk_sensor
            ) VALUES (NULL,?,?,?,?,1,?,?,?,?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $numero_remito);
        $sql->bindValue(2, $elemento);
        $sql->bindValue(3, $fk_obra);
        $sql->bindValue(4, $fk_empresa);
        $sql->bindValue(5, $fk_hormigon);
        $sql->bindValue(6, $fk_alarmas);
        $sql->bindValue(7, $fk_dispositivo);
        $sql->bindValue(8, $hora);
        $sql->bindValue(9, $fecha_hormigonado);
        $sql->bindValue(10, $fk_sensor);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_id_elementos_insert($elementos, $descripcion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT idelemento FROM elementos WHERE elementos = ? AND  descripcion = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $elementos);
        $sql->bindValue(2, $descripcion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function mostrar_elementos_x_id($idElemento)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT elementos.idElemento,
        elementos.fk_obra,
        elementos.numero_remito,
        elementos.fk_hormigon,
        elementos.fk_alarmas,
        elementos.fecha_hormigonado,
        elementos.fk_empresa,
        elementos.fk_dispositivo,
        elementos.elemento,
        elementos.hora,
        elementos.fk_sensor,
        sensores.numero_serie,
        obras.nombreObra,
        obras.idObra,
        hormigon.tipo_hormigon,
        hormigon.idHormigon,
        alarmas.descripcion,
        alarmas.idAlarma,
        empresas.nombreEmpresa,
        empresas.idEmpresa,
        dispositivos.dispositivo,
        dispositivos.idDispositivo
        FROM elementos
        INNER JOIN obras ON elementos.fk_obra= obras.idObra
        INNER JOIN hormigon ON elementos.fk_hormigon= hormigon.idHormigon
        INNER JOIN alarmas ON elementos.fk_alarmas = alarmas.idAlarma
        INNER JOIN empresas ON elementos.fk_empresa = empresas.idEmpresa
        INNER JOIN dispositivos ON elementos.fk_dispositivo = dispositivos.idDispositivo
        INNER JOIN sensores ON elementos.fk_sensor = sensores.idSensor
        WHERE elementos.idElemento=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idElemento);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function update_elementos(
        
    $numero_remito,
    $elemento,
    $fk_obra,
    $fk_empresa,
    $fk_hormigon,
    $fk_alarmas,
    $fk_dispositivo,
    $hora,
    $fecha_hormigonado,
    $fk_sensor,
    $idElemento)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE elementos set
            numero_remito=?,
            elemento=?,
            fk_obra=?,
            fk_empresa=?,
            fk_hormigon=?,
            fk_alarmas=?,
            fk_dispositivo=?,
            hora=?,
            fecha_hormigonado=?,
            fk_sensor=?
            WHERE
            idelemento = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $numero_remito);
        $sql->bindValue(2, $elemento);
        $sql->bindValue(3, $fk_obra);
        $sql->bindValue(4, $fk_empresa);
        $sql->bindValue(5, $fk_hormigon);
        $sql->bindValue(6, $fk_alarmas);
        $sql->bindValue(7, $fk_dispositivo);
        $sql->bindValue(8, $hora);
        $sql->bindValue(9, $fecha_hormigonado);
        $sql->bindValue(10, $fk_sensor);
        $sql->bindValue(11, $idElemento);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function delete_elementos($idElemento)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE elementos SET estado= 2
        where idElemento=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idElemento);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}

?>
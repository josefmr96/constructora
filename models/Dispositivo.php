
<?php

class Dispositivo extends Conectar{

    public function obtener_dispositivos(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM dispositivos where estado =1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insertar_dispositivo($fk_sensor,$dispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO dispositivos
         (idDispositivo, fk_sensor, dispositivo, estado) VALUES (NULL,?,?,1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_sensor);
        $sql->bindValue(2, $dispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function get_id_dispositivos_insert($dispositivos,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idDispositivo FROM dispositivos WHERE dispositivos = ? AND  descripcion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $dispositivos);
            $sql->bindValue(2, $descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
    public function get_dispositivos_x_id($idDispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT dispositivos.idDispositivo,
        dispositivos.dispositivo,
          dispositivos.fk_sensor,
       sensores.numero_serie
		  FROM dispositivos
       INNER JOIN sensores ON dispositivos.fk_sensor = sensores.idSensor
       WHERE idDispositivo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idDispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function update_dispositivos($idDispositivo,$fk_sensor,$dispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE dispositivos set
            fk_sensor = ?,
            dispositivo = ?
            WHERE
            idDispositivo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_sensor);
        $sql->bindValue(2, $dispositivo);
        $sql->bindValue(3, $idDispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_dispositivo($idDispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE dispositivos set
        estado = 2
        WHERE
        idDispositivo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idDispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
  
}

?>
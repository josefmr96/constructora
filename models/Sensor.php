
<?php

class Sensor extends Conectar{

    public function obtener_sensores(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT sensores.idSensor,
         sensores.numero_serie,
          sensores.disponible,
           sensores.fk_empresa,
        empresas.nombreEmpresa FROM sensores
        INNER JOIN empresas ON sensores.fk_empresa = empresas.idEmpresa;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insertar_sensores($fk_empresa,$numero_serie){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO sensores (idSensor, fk_empresa, numero_serie, disponible) VALUES (NULL,?,?,1);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_empresa);
        $sql->bindValue(2, $numero_serie);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function insertar_sensor($fk_empresa,$numero_serie,$fk_dispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO sensores (idSensor, fk_empresa, numero_serie, disponible,fk_dispositivo) VALUES (NULL,?,?,1,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_empresa);
        $sql->bindValue(2, $numero_serie);
        $sql->bindValue(3, $fk_dispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function get_id_sensores_insert($sensores,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idSensor FROM sensores WHERE sensores = ? AND  descripcion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $sensores);
            $sql->bindValue(2, $descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
    public function get_sensores_x_id($idSensor){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT sensores.idSensor,
        sensores.numero_serie,
         sensores.disponible,
          sensores.fk_empresa,
       empresas.nombreEmpresa FROM sensores
       INNER JOIN empresas ON sensores.fk_empresa = empresas.idEmpresa
       WHERE idSensor = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idSensor);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }  
         public function obtener_id_sensor_elementos($fk_dispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT sensores.idSensor,
        sensores.numero_serie,
         sensores.disponible,
          sensores.fk_empresa,
          sensores.fk_dispositivo,
          empresas.nombreEmpresa
      FROM sensores
       INNER JOIN empresas ON sensores.fk_empresa = empresas.idEmpresa
       WHERE fk_dispositivo = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_dispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }   
    public function obtener_sensores_dispositivo($fk_dispositivo){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT sensores.idSensor,
        sensores.numero_serie,
         sensores.disponible,
          sensores.fk_empresa,
          sensores.fk_dispositivo,
       empresas.nombreEmpresa FROM sensores
       INNER JOIN empresas ON sensores.fk_empresa = empresas.idEmpresa
       WHERE fk_dispositivo =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_dispositivo);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function update_sensores($idSensor,$fk_empresa,$numero_serie){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE sensores set
            fk_empresa = ?,
            numero_serie = ?
            WHERE
            idSensor = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_empresa);
        $sql->bindValue(2, $numero_serie);
        $sql->bindValue(3, $idSensor);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_sensor($idSensor){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE sensores set
        disponible = 2
        WHERE
        idSensor = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idSensor);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
  
}

?>
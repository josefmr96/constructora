<?php

class Rubro extends Conectar{

    public function get_rubro(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idrubro, rubro FROM rubro;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insert_rubro($rubro){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO rubro (idrubro, rubro) VALUES (NULL,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $rubro);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function get_rubro_x_id($idrubro){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM rubro WHERE  idrubro =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idrubro);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function update_rubro($idrubro,$rubro){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE rubro set
            rubro = ?
            WHERE
            idrubro = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $rubro);
        $sql->bindValue(2, $idrubro);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_rubro($idrubro){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM  rubro WHERE idrubro= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idrubro);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
  
}

?>
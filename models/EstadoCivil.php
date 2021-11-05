<?php

class EstadoCivil extends Conectar{

    public function get_estadocivil(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idestadocivil, estadoCivil FROM estado_civil;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insert_estadocivil($estadocivil){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO estado_civil (idestadocivil, estadoCivil) VALUES (NULL,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $estadocivil);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function get_estadocivil_x_id($idestadocivil){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM estado_civil WHERE  idestadocivil =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idestadocivil);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function update_estadocivil($idestadocivil,$estadocivil){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE estado_civil set
            estadoCivil = ?
            WHERE
            idestadocivil = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $estadocivil);
        $sql->bindValue(2, $idestadocivil);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_estadocivil($idestadocivil){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM  estado_civil WHERE idestadocivil= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idestadocivil);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
  
}

?>
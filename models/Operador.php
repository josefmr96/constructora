
<?php

class Operador extends Conectar{

    public function obtener_operadores(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idOperador, operador, descripcion FROM operador;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insert_operador($operador,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO operador (idOperador, operador, descripcion) VALUES (NULL,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $operador);
        $sql->bindValue(2, $descripcion);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function get_id_operador_insert($operador,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idOperador FROM operador WHERE operador = ? AND  descripcion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $operador);
            $sql->bindValue(2, $descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
    public function get_operador_x_id($idOperador){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM operador WHERE  idOperador =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idOperador);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function update_operador($idOperador,$operador,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE operador set
            operador = ?,
            descripcion = ?
            WHERE
            idOperador = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $operador);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $idOperador);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_operador($idOperador){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM  operador WHERE idOperador= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idOperador);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
  
}

?>
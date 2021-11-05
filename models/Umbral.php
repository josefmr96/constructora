
<?php

class Umbral extends Conectar{

    public function obtener_umbrales(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idUmbral, umbral, descripcion FROM umbral;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insert_umbral($umbral,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO umbral (idUmbral, umbral, descripcion) VALUES (NULL,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $umbral);
        $sql->bindValue(2, $descripcion);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function get_id_umbral_insert($umbral,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idUmbral FROM umbral WHERE umbral = ? AND  descripcion = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $umbral);
            $sql->bindValue(2, $descripcion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
    public function get_umbral_x_id($idUmbral){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM umbral WHERE  idUmbral =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idUmbral);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function update_umbral($idUmbral,$umbral,$descripcion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="UPDATE umbral set
            umbral = ?,
            descripcion = ?
            WHERE
            idUmbral = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $umbral);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $idUmbral);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
    public function delete_umbral($idUmbral){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="DELETE FROM  umbral WHERE idUmbral= ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idUmbral);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }
  
}

?>
<?php

class Domicilio extends Conectar{

  public function obtener_provincias(){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM provincias ;";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
  }

  public function obtener_localidades($idProvincia){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT * FROM provincias
    INNER join localidades on localidades.fk_provincia = provincias.idProvincia
    WHERE  idProvincia =?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idProvincia);
        $sql->execute();
        return $resultado=$sql->fetchAll();
  }
  public function insertar_domicilio(
        $direccion,
        $fk_localidad,
        $fk_provincia,
        $codigo_postal){
          $conectar= parent::conexion();
          parent::set_names();  
          $sql="INSERT INTO direccion (
                    direccion,
                    fk_localidad,
                    fk_provincia,
                    codigo_postal)
                     VALUES (?,?,?,?);";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $direccion);
          $sql->bindValue(2, $fk_localidad);
          $sql->bindValue(3, $fk_provincia);
          $sql->bindValue(4, $codigo_postal);
          $sql->execute();
          return $resultado=$sql->fetchAll();
      
      
  }   public function insertar_domicilio_obra(
        $direccion,
        $fk_localidad,
        $fk_provincia,
        $codigo_postal,
        $fk_empresa){
          $conectar= parent::conexion();
          parent::set_names();  
          $sql="INSERT INTO direccion (
                    direccion,
                    fk_localidad,
                    fk_provincia,
                    codigo_postal,
                    fk_empresa)
                     VALUES (?,?,?,?,?);";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $direccion);
          $sql->bindValue(2, $fk_localidad);
          $sql->bindValue(3, $fk_provincia);
          $sql->bindValue(4, $codigo_postal);
          $sql->bindValue(5, $fk_empresa);
          $sql->execute();
          return $resultado=$sql->fetchAll();
      
      
  }   
  public function insertar_empresa_domicilio($fk_empresa,$idDireccion){

      $conectar= parent::conexion();
      parent::set_names();
      $sql="UPDATE direccion set
          fk_empresa = ?
          WHERE
          idDireccion = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $fk_empresa);
      $sql->bindValue(2, $idDireccion);
      $sql->execute();
      return $resultado=$sql->fetchAll();

      
      
  }   public function insertar_obra_domicilio($fk_obra,$idDireccion){

      $conectar= parent::conexion();
      parent::set_names();
      $sql="UPDATE direccion set
          fk_obra = ?
          WHERE
          idDireccion = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $fk_obra);
      $sql->bindValue(2, $idDireccion);
      $sql->execute();
      return $resultado=$sql->fetchAll();

      
      
  } 
   public function insertar_proveedor_domicilio($fk_proveedor,$idDireccion){

      $conectar= parent::conexion();
      parent::set_names();
      $sql="UPDATE direccion set
          fk_proveedor = ?
          WHERE
          idDireccion = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $fk_proveedor);
      $sql->bindValue(2, $idDireccion);
      $sql->execute();
      return $resultado=$sql->fetchAll();

      
      
  }   public function update_empresa_domicilio(
    $direccion,
    $fk_localidad,
    $fk_provincia,
    $codigo_postal,
    $idDireccion){

      $conectar= parent::conexion();
      parent::set_names();
      $sql="UPDATE direccion set
          direccion= ?,
          fk_localidad= ?,
          fk_provincia= ?,
          codigo_postal= ?
          WHERE
          idDireccion = ?";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $direccion);
      $sql->bindValue(2, $fk_localidad);
      $sql->bindValue(3, $fk_provincia);
      $sql->bindValue(4, $codigo_postal);
      $sql->bindValue(5, $idDireccion);
      $sql->execute();
      return $resultado=$sql->fetchAll();

      
      
  } 
  public function obtener_id_domicilio($direccion,$fk_localidad,$fk_provincia,$codigo_postal){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT idDireccion
     FROM direccion
     WHERE direccion = ? AND fk_localidad = ? AND fk_provincia = ?  AND codigo_postal = ? ;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $direccion);
        $sql->bindValue(2, $fk_localidad);
        $sql->bindValue(3, $fk_provincia);
        $sql->bindValue(4, $codigo_postal);

 
        $sql->execute();
        return $resultado=$sql->fetchAll();
}   
 public function obtener_id_localidad($idDireccion){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT direccion.fk_localidad,
    direccion.idDireccion,
   localidades.localidad
   FROM direccion
   INNER JOIN localidades ON direccion.fk_localidad= localidades.idLocalidad
   WHERE idDireccion =? ;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idDireccion);
        $sql->execute();
        return $resultado=$sql->fetchAll();
}  
 public function get_id_domicilioFicha($fk_ficha){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT iddomicilio, fk_ficha  FROM domicilio WHERE fk_ficha = ? ;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_ficha);
        $sql->execute();
        return $resultado=$sql->fetchAll();
}  
public function delete_domicilio($iddomicilio)
  {
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "UPDATE domicilio set
    estado = 1
    WHERE
    iddomicilio = ?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $iddomicilio);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }
  
}

?>
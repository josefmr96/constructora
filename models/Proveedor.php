<?php 

Class Proveedor extends Conectar{
    public function update_proveedor_modal(
        $correo,
        $cuil,
        $telefono,
        $fk_direccion){
    
          $conectar= parent::conexion();
          parent::set_names();
          $sql="UPDATE proveedores set
              correo= ?,
              cuil= ?,
              telefono= ?
              WHERE
              fk_direccion = ?";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $correo);
          $sql->bindValue(2, $cuil);
          $sql->bindValue(3, $telefono);
          $sql->bindValue(4, $fk_direccion);
          $sql->execute();
          return $resultado=$sql->fetchAll();
    
          
          
      }   

      public function obtener_proveedores(){
    
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM proveedores";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll();
  
        
        
    } 
        public function delete_proveedor($fk_direccion){
    
          $conectar= parent::conexion();
          parent::set_names();
          $sql="UPDATE proveedores set
              estado= 2
              WHERE
              fk_direccion = ?";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $fk_direccion);
          $sql->execute();
          return $resultado=$sql->fetchAll();
    
          
          
      } 
    public function listar_proveedores(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        direccion.idDireccion,
        direccion.direccion,
        direccion.fk_localidad,
        direccion.fk_provincia,
        direccion.fk_proveedor,
        direccion.codigo_postal,
        proveedores.nombreProveedor,
        proveedores.estado,
        proveedores.correo,
        proveedores.cuil,
        proveedores.telefono,
        proveedores.idProveedor,
        proveedores.fk_direccion,
        provincias.provincia,
        localidades.localidad
        FROM direccion
        INNER JOIN proveedores ON direccion.fk_proveedor= proveedores.idProveedor
        INNER JOIN provincias ON direccion.fk_provincia= provincias.idProvincia
        INNER JOIN localidades ON direccion.fk_localidad=localidades.idLocalidad
        where estado= 1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
    
    public function mostrar_proveedor_porId($idDireccion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        direccion.idDireccion,
        direccion.direccion,
        direccion.fk_localidad,
        direccion.fk_provincia,
        direccion.fk_proveedor,
        direccion.codigo_postal,
        proveedores.nombreProveedor,
        proveedores.estado,
        proveedores.correo,
        proveedores.cuil,
        proveedores.telefono,
        proveedores.idProveedor,
        proveedores.fk_direccion,
        provincias.provincia,
        localidades.localidad
        FROM direccion
        INNER JOIN proveedores ON direccion.fk_proveedor= proveedores.idProveedor
        INNER JOIN provincias ON direccion.fk_provincia= provincias.idProvincia
        INNER JOIN localidades ON direccion.fk_localidad=localidades.idLocalidad
        WHERE idDireccion =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idDireccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insertar_proveedor( $nombreProveedor, $fk_direccion, $correo, $cuil, $telefono){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO proveedores (
            idProveedor,
         nombreProveedor,
          estado,
           fk_direccion, 
           correo, 
           cuil, 
           telefono) VALUES (NULL,?,1,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombreProveedor);
        $sql->bindValue(2, $fk_direccion);
        $sql->bindValue(3, $correo);
        $sql->bindValue(4, $cuil);
        $sql->bindValue(5, $telefono);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function obtener_id_proveedor($fk_direccion){ //obtenemos id para insertar en direccion
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idProveedor
        FROM proveedores
        WHERE fk_direccion =? ;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fk_direccion);
    
     
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
  
}

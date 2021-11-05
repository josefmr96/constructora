<?php 

Class Empresa extends Conectar{
    public function update_empresa_modal(
        $correo,
        $cuil,
        $telefono,
        $fk_direccion){
    
          $conectar= parent::conexion();
          parent::set_names();
          $sql="UPDATE empresas set
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
        public function delete_empresa($fk_direccion){
    
          $conectar= parent::conexion();
          parent::set_names();
          $sql="UPDATE empresas set
              estado= 2
              WHERE
              fk_direccion = ?";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $fk_direccion);
          $sql->execute();
          return $resultado=$sql->fetchAll();
    
          
          
      }     
        public function obtener_empresas(){
    
          $conectar= parent::conexion();
          parent::set_names();
          $sql="SELECT * FROM empresas";
          $sql=$conectar->prepare($sql);
          $sql->execute();
          return $resultado=$sql->fetchAll();
    
          
          
      } 
    public function listar_empresas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        direccion.idDireccion,
        direccion.direccion,
        direccion.fk_localidad,
        direccion.fk_provincia,
        direccion.fk_empresa,
        direccion.codigo_postal,
        empresas.nombreEmpresa,
        empresas.estado,
        empresas.correo,
        empresas.cuil,
        empresas.telefono,
        empresas.idEmpresa,
        empresas.fk_direccion,
        provincias.provincia,
        localidades.localidad
        FROM direccion
        INNER JOIN empresas ON direccion.fk_empresa= empresas.idEmpresa
        INNER JOIN provincias ON direccion.fk_provincia= provincias.idProvincia
        INNER JOIN localidades ON direccion.fk_localidad=localidades.idLocalidad
        where estado= 1;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
    
    public function mostrar_empresa_porId($idDireccion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        direccion.idDireccion,
        direccion.direccion,
        direccion.fk_localidad,
        direccion.fk_provincia,
        direccion.fk_empresa,
        direccion.codigo_postal,
        empresas.nombreEmpresa,
        empresas.estado,
        empresas.correo,
        empresas.cuil,
        empresas.telefono,
        empresas.idEmpresa,
        empresas.fk_direccion,
        provincias.provincia,
        localidades.localidad
        FROM direccion
        INNER JOIN empresas ON direccion.fk_empresa= empresas.idEmpresa
        INNER JOIN provincias ON direccion.fk_provincia= provincias.idProvincia
        INNER JOIN localidades ON direccion.fk_localidad=localidades.idLocalidad
        WHERE idDireccion =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idDireccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insertar_empresa( $nombreEmpresa, $fk_direccion, $correo, $cuil, $telefono){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO empresas (
            idEmpresa,
         nombreEmpresa,
          estado,
           fk_direccion, 
           correo, 
           cuil, 
           telefono) VALUES (NULL,?,1,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombreEmpresa);
        $sql->bindValue(2, $fk_direccion);
        $sql->bindValue(3, $correo);
        $sql->bindValue(4, $cuil);
        $sql->bindValue(5, $telefono);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    } 
    public function obtener_id_empresa($fk_direccion){ //obtenemos id para insertar en direccion
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idEmpresa
        FROM empresas
        WHERE fk_direccion =? ;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fk_direccion);
    
     
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
  
}

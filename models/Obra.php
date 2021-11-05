
<?php

class Obra extends Conectar
{
    public function update_obra_domicilio(
        $nombreObra,
        $comentario,
        $fk_direccion){
    
          $conectar= parent::conexion();
          parent::set_names();
          $sql="UPDATE obras set
              nombreObra=?,
            comentario=?
              WHERE
              fk_direccion = ?";
          $sql=$conectar->prepare($sql);
          $sql->bindValue(1, $nombreObra);
          $sql->bindValue(2, $comentario);
          $sql->bindValue(3, $fk_direccion);
          $sql->execute();
          return $resultado=$sql->fetchAll();
    
          
          
      } 
    public function mostrar_obra_porId($idDireccion){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        direccion.idDireccion,
        direccion.direccion,
        direccion.fk_localidad,
        direccion.fk_provincia,
        direccion.fk_empresa,
        direccion.codigo_postal,
        direccion.fk_obra,
        empresas.nombreEmpresa,
        empresas.idEmpresa,
        provincias.provincia,
        localidades.localidad,
        obras.nombreObra,
        obras.comentario
        FROM direccion
        INNER JOIN empresas ON direccion.fk_empresa= empresas.idEmpresa
        INNER JOIN provincias ON direccion.fk_provincia= provincias.idProvincia
        INNER JOIN localidades ON direccion.fk_localidad=localidades.idLocalidad
        INNER JOIN obras ON direccion.fk_obra= obras.idObra
        WHERE idDireccion =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idDireccion);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function obtener_obras()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
        direccion.idDireccion,
        direccion.direccion,
        direccion.fk_localidad,
        direccion.fk_provincia,
        direccion.fk_empresa,
        direccion.fk_obra,
        direccion.codigo_postal,
        empresas.nombreEmpresa,
        empresas.fk_direccion,
        provincias.provincia,
        localidades.localidad,
        obras.nombreObra,
        obras.comentario,
        obras.idObra
        FROM direccion
        INNER JOIN empresas ON direccion.fk_empresa= empresas.idEmpresa
        INNER JOIN provincias ON direccion.fk_provincia= provincias.idProvincia
        INNER JOIN localidades ON direccion.fk_localidad=localidades.idLocalidad
        INNER JOIN obras ON direccion.fk_obra= obras.idObra
         where obras.estado= 1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function insertar_obras($nombreObra, $comentario,$fk_direccion,$fk_empresa)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO obras (
            idObra,
            nombreObra,
            comentario,
            fk_direccion,
            fk_empresa,
            estado
            ) VALUES (NULL,?,?,?,?,1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombreObra);
        $sql->bindValue(2, $comentario);
        $sql->bindValue(3, $fk_direccion);
        $sql->bindValue(4, $fk_empresa);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_id_obras_insert($obras, $descripcion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT idObra FROM obras WHERE obras = ? AND  descripcion = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $obras);
        $sql->bindValue(2, $descripcion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_obras_x_id($idObra)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
        obras.idObra,
        obras.fk_empresa,
        obras.descripcion,
        obras.fk_operador,
        obras.fk_umbral,
        obras.correo,
        obras.fk_proveedor,
        empresas.nombreEmpresa,
        operador.operador,
        umbral.umbral,
        proveedores.nombreProveedor
   FROM obras
   INNER JOIN empresas ON obras.fk_empresa = empresas.idEmpresa
   INNER JOIN operador ON obras.fk_operador = operador.idOperador
   INNER JOIN proveedores ON obras.fk_proveedor = proveedores.idProveedor
   INNER JOIN umbral ON obras.fk_umbral = umbral.idUmbral
   where obras.idObra=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idObra);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function update_obras(
        $fk_empresa,
        $descripcion,
        $fk_operador,
        $fk_umbral,
        $correo,
        $fk_proveedor,
        $idObra)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE obras set
            fk_empresa=?,
            descripcion=?,
            fk_operador=?,
            fk_umbral=?,
            correo=?,
            fk_proveedor=?
            WHERE
            idObra = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $fk_empresa);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $fk_operador);
        $sql->bindValue(4, $fk_umbral);
        $sql->bindValue(5, $correo);
        $sql->bindValue(6, $fk_proveedor);
        $sql->bindValue(7, $idObra);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function delete_obras($fk_direccion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE obras SET estado= 2
        where fk_direccion=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $fk_direccion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function obtener_id_obra($fk_direccion){ //obtenemos id para insertar en direccion
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idobra
        FROM obras
        WHERE fk_direccion =? ;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fk_direccion);
    
     
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function obtener_id_obras_elementos($fk_empresa){ 
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idObra,
        nombreObra
        FROM obras
        WHERE fk_empresa =? ;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fk_empresa);
    
     
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
}

?>
<?php 

Class Cliente extends Conectar{
    public function get_cliente(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT 
        ficha_usuarios.idficha,
        ficha_usuarios.nombre,
        ficha_usuarios.apellido,
        ficha_usuarios.numero_documento,
        ficha_usuarios.fecha_ingreso
        FROM 
        ficha_usuarios;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function get_cliente_x_id($idficha){
        $conectar= parent::conexion();
        parent::set_names();    
        $sql="SELECT 
        ficha_usuarios.idficha,
        ficha_usuarios.nombre,
        ficha_usuarios.apellido,
        ficha_usuarios.numero_documento,
        ficha_usuarios.idTributario,
        ficha_usuarios.correo,
        ficha_usuarios.fecha_ingreso,
        ficha_usuarios.fk_sexo,
        ficha_usuarios.fk_estadoCivil,
        ficha_usuarios.fk_tipoPersona,
        ficha_usuarios.fk_nacionalidad,
        ficha_usuarios.fk_tipoDocumento,
        ficha_usuarios.fk_actividad,
        ficha_usuarios.fk_rubro,
        ficha_usuarios.fk_tributario,
        ficha_usuarios.fk_cbu,
        ficha_usuarios.fk_domicilio,
        ficha_usuarios.fk_comunicacion,
        domicilio.calle,
        domicilio.numeroCalle,
        domicilio.piso,     
        domicilio.departamento,
        domicilio.codigo_postal,
    tipo_documento.documento,
        estado_civil.estadoCivil,
    nacionalidad.nacionalidad,
        tipo_persona.persona,
    medios_comunicacion.numero,
        sexo.sexo,
    actividad.actividad,
        cbu.cbu,
        cbu.tipo_cuenta,
    rubro.rubro,
    tipo_tributario.tributacion
    FROM 
    ficha_usuarios

    INNER join tipo_documento on ficha_usuarios.fk_tipoDocumento = tipo_documento.iddocumento

    INNER join estado_civil on ficha_usuarios.fk_estadoCivil = estado_civil.idestadocivil

    INNER join sexo on ficha_usuarios.fk_sexo = sexo.idsexo

    INNER join actividad on ficha_usuarios.fk_actividad = actividad.idactividad

    INNER join rubro on ficha_usuarios.fk_rubro = rubro.idrubro

    INNER join tipo_persona on ficha_usuarios.fk_tipoPersona = tipo_persona.idpersona

    INNER join nacionalidad on ficha_usuarios.fk_nacionalidad = nacionalidad.idnacionalidad

    INNER join cbu on ficha_usuarios.fk_cbu = cbu.idcbu

    INNER join medios_comunicacion on ficha_usuarios.fk_comunicacion = medios_comunicacion.idmedios
    INNER join tipo_tributario on ficha_usuarios.fk_tributario = tipo_tributario.idtributaria

    INNER join domicilio on ficha_usuarios.fk_domicilio = domicilio.iddomicilio WHERE  idficha =?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $idficha);
        $sql->execute();
        
        return $resultado=$sql->fetchAll();
    }
    public function get_estado_civil(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  idestadocivil, estadoCivil FROM estado_civil;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }    
    public function get_nacionalidad(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  idnacionalidad, nacionalidad FROM nacionalidad;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }  
    public function get_sexo(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  idsexo, sexo FROM sexo;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
    public function get_tipo_persona(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idpersona, persona FROM tipo_persona;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function get_actividad(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  actividad FROM actividad;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
     public function get_rubro(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  rubro FROM rubro;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }   
    public function get_cbu(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  cbu, tipo_cuenta, banco, estado FROM cbu;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }
    public function insertar_cliente($nombre,
    $apellido,
    $numero_documento,
    $fk_tipoDocumento,
    $fecha_ingreso,
    $fk_nacionalidad,
    $fk_estadoCivil,
    $fk_sexo,
    $fk_tipoPersona,
    $fk_comunicacion,
    $fk_domicilio,
    $fk_rubro,
    $fk_actividad,
    $fk_tributario,
    $idTributario,
    $fk_cbu){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ficha_usuarios(
            nombre,
            apellido,
            numero_documento,
            fk_tipoDocumento,
            fecha_ingreso,
            fk_nacionalidad,
            fk_estadoCivil,
            fk_sexo,
            fk_tipoPersona,
            fk_comunicacion,
            fk_domicilio,
            fk_rubro,
            fk_actividad,
            fk_tributario,
            idTributario,
            fk_cbu) 
            VALUES 
            (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellido);
        $sql->bindValue(3, $numero_documento);
        $sql->bindValue(4, $fk_tipoDocumento);
        $sql->bindValue(5, $fecha_ingreso);
        $sql->bindValue(6, $fk_nacionalidad);
        $sql->bindValue(7, $fk_estadoCivil);
        $sql->bindValue(8, $fk_sexo);
        $sql->bindValue(9, $fk_tipoPersona);
        $sql->bindValue(10, $fk_comunicacion);
        $sql->bindValue(11, $fk_domicilio);
        $sql->bindValue(12, $fk_rubro);
        $sql->bindValue(13, $fk_actividad);
        $sql->bindValue(14, $fk_tributario);
        $sql->bindValue(15, $idTributario);
        $sql->bindValue(16, $fk_cbu);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        
    }
    public function insertar_medio_comunicacion($fk_medios,$numero){
        $conectar= parent::conexion();
        parent::set_names();  
        $sql="INSERT INTO medios_comunicacion (fk_medios,numero) VALUES (?,?);";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_medios);
        $sql->bindValue(2, $numero);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        
        
    } 
    public function get_medio_x_id($fk_fichaCliente){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT medios_comunicacion.numero,
        medios_comunicacion.fk_medios,
        medios_comunicacion.idmedios,
        medios.medio,
        medios.idmedio,
        medios_comunicacion.fk_fichaCliente
        FROM medios_comunicacion
        INNER JOIN medios ON medios_comunicacion.fk_medios= medios.idmedio
        WHERE fk_fichaCliente =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $fk_fichaCliente);
            $sql->execute();
            return $resultado=$sql->fetchAll();
}

     public function update_fichas($fk_ficha,$fk_fichaCliente,$iddomicilio,$idcbu,$idmedios){
        $conectar= parent::conexion();
        parent::set_names();  
        $sql="UPDATE domicilio, cbu, medios_comunicacion
            SET domicilio.fk_ficha = ? ,
                cbu.fk_ficha = ?,
                medios_comunicacion.fk_fichaCliente =?
            WHERE
                domicilio.iddomicilio = ?
                AND cbu.idcbu = ?
                AND medios_comunicacion.idmedios =?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $fk_ficha);
        $sql->bindValue(2, $fk_ficha);
        $sql->bindValue(3, $fk_fichaCliente);
        $sql->bindValue(4, $iddomicilio);
        $sql->bindValue(5, $idcbu);
        $sql->bindValue(6, $idmedios);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        
        
    }   
     public function update_ficha_x_id(
        $nombre,$apellido,
        $numero_documento,$idTributario,
        $fecha_ingreso,$fk_sexo,
        $fk_estadoCivil,$fk_tipoPersona,
        $fk_nacionalidad,$fk_tipoDocumento,
        $fk_actividad,$fk_rubro,
        $fk_tributario,
        $idficha){
        $conectar= parent::conexion();
        parent::set_names();  
        $sql="UPDATE ficha_usuarios
        SET nombre = ?,
          apellido =?,
          numero_documento= ?,
          idTributario= ?,
          fecha_ingreso= ?,
          fk_sexo= ?,
          fk_estadoCivil= ?,
          fk_tipoPersona= ?,
          fk_nacionalidad=?,
          fk_tipoDocumento=?,
          fk_actividad=?,
          fk_rubro=?,
          fk_tributario=?
        WHERE
             idficha = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $apellido);
        $sql->bindValue(3, $numero_documento);
        $sql->bindValue(4, $idTributario);
        $sql->bindValue(5, $fecha_ingreso);
        $sql->bindValue(6, $fk_sexo);
        $sql->bindValue(7, $fk_estadoCivil);
        $sql->bindValue(8, $fk_tipoPersona);
        $sql->bindValue(9, $fk_nacionalidad);
        $sql->bindValue(10, $fk_tipoDocumento);
        $sql->bindValue(11, $fk_actividad);
        $sql->bindValue(12, $fk_rubro);
        $sql->bindValue(13, $fk_tributario);
        $sql->bindValue(14, $idficha);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        
        
    } 
    public function update_domicilio_x_id(
        $calle,
        $numeroCalle,
        $piso,
        $departamento,
        $fk_localidad,
        $fk_provincia,
        $codigo_postal,
        $iddomicilio){
        $conectar= parent::conexion();
        parent::set_names();  
        $sql="UPDATE domicilio
        SET calle=?,
            numeroCalle=?,
            piso=?,
            departamento=?,
            fk_localidad=?,
            fk_provincia=?,
            codigo_postal=?
        WHERE
             iddomicilio = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $calle);
        $sql->bindValue(2, $numeroCalle);
        $sql->bindValue(3, $piso);
        $sql->bindValue(4, $departamento);
        $sql->bindValue(5, $fk_localidad);
        $sql->bindValue(6, $fk_provincia);
        $sql->bindValue(7, $codigo_postal);
        $sql->bindValue(8, $iddomicilio);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        
        
    }  
     public function update_medioComunicacion_x_id(
        $numero,
        $fk_medios,
        $idmedios){

        $conectar= parent::conexion();
        parent::set_names();  
        $sql="UPDATE medios_comunicacion
        SET numero=?,
            fk_medios=?
        WHERE
             idmedios = ?;";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $numero);
        $sql->bindValue(2, $fk_medios);
        $sql->bindValue(3, $idmedios);
        $sql->execute();
        return $resultado=$sql->fetchAll();
        
        
    } 
      public function get_medio_comunicacion(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT  idmedio, medio FROM medios;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }  
    public function get_id_medio($numero){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idmedios FROM medios_comunicacion WHERE numero = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numero);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }    
       
      public function get_id_ficha($nombre,$apellido,$numero_documento){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idficha FROM ficha_usuarios 
        WHERE nombre = ?
         AND apellido = ? AND numero_documento = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $nombre);
            $sql->bindValue(2, $apellido);
            $sql->bindValue(3, $numero_documento);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }     
    public function get_domicilio($numero){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT idmedios FROM medios_comunicacion WHERE numero = ?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $numero);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    } 
      public function get_provincia(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM provincia
        ;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }  

    public function obtener_localidad($idprovincia){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM provincia
        INNER join localidad on localidad.provincia_id = provincia.idprovincia
        WHERE  idprovincia =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $idprovincia);
            $sql->execute();
            return $resultado=$sql->fetchAll();
    }  
}

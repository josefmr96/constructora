
<?php

class Alarma extends Conectar
{

    public function obtener_alarmas()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
            alarmas.idAlarma,
            alarmas.fk_empresa,
            alarmas.descripcion,
            alarmas.fk_operador,
            alarmas.fk_umbral,
            alarmas.correo,
            alarmas.fk_proveedor,
            empresas.nombreEmpresa,
            operador.operador,
            umbral.umbral,
            proveedores.nombreProveedor
       FROM alarmas
       INNER JOIN empresas ON alarmas.fk_empresa = empresas.idEmpresa
       INNER JOIN operador ON alarmas.fk_operador = operador.idOperador
       INNER JOIN proveedores ON alarmas.fk_proveedor = proveedores.idProveedor
       INNER JOIN umbral ON alarmas.fk_umbral = umbral.idUmbral
       where alarmas.estado=1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function insert_alarmas($fk_empresa, $descripcion,$fk_operador,$fk_umbral,$correo,$fk_proveedor)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO alarmas (
            idAlarma,
            fk_empresa,
            descripcion,
            fk_operador,
            fk_umbral,
            correo,
            fk_proveedor,
            estado
            ) VALUES (NULL,?,?,?,?,?,?,?);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $fk_empresa);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $fk_operador);
        $sql->bindValue(4, $fk_umbral);
        $sql->bindValue(5, $correo);
        $sql->bindValue(6, $fk_proveedor);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_id_alarmas_insert($alarmas, $descripcion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT idAlarma FROM alarmas WHERE alarmas = ? AND  descripcion = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $alarmas);
        $sql->bindValue(2, $descripcion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_alarmas_x_id($idAlarma)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
        alarmas.idAlarma,
        alarmas.fk_empresa,
        alarmas.descripcion,
        alarmas.fk_operador,
        alarmas.fk_umbral,
        alarmas.correo,
        alarmas.fk_proveedor,
        empresas.nombreEmpresa,
        operador.operador,
        umbral.umbral,
        proveedores.nombreProveedor
   FROM alarmas
   INNER JOIN empresas ON alarmas.fk_empresa = empresas.idEmpresa
   INNER JOIN operador ON alarmas.fk_operador = operador.idOperador
   INNER JOIN proveedores ON alarmas.fk_proveedor = proveedores.idProveedor
   INNER JOIN umbral ON alarmas.fk_umbral = umbral.idUmbral
   where alarmas.idAlarma=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idAlarma);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function update_alarmas(
        $fk_empresa,
        $descripcion,
        $fk_operador,
        $fk_umbral,
        $correo,
        $fk_proveedor,
        $idAlarma)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE alarmas set
            fk_empresa=?,
            descripcion=?,
            fk_operador=?,
            fk_umbral=?,
            correo=?,
            fk_proveedor=?
            WHERE
            idAlarma = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $fk_empresa);
        $sql->bindValue(2, $descripcion);
        $sql->bindValue(3, $fk_operador);
        $sql->bindValue(4, $fk_umbral);
        $sql->bindValue(5, $correo);
        $sql->bindValue(6, $fk_proveedor);
        $sql->bindValue(7, $idAlarma);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function delete_alarmas($idAlarma)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE alarmas SET estado= 2
        where idAlarma=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idAlarma);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}

?>
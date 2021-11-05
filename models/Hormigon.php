
<?php

class Hormigon extends Conectar
{

    public function obtener_hormigon()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
        hormigon.idHormigon,
        hormigon.tipo_hormigon,
        hormigon.tipo_asentamiento,
        hormigon.pendiente,
        hormigon.ordenada_origen,
        hormigon.fk_empresa,
        hormigon.descripcion,
        hormigon.fk_proveedor,
        empresas.nombreEmpresa,
        proveedores.nombreProveedor
        FROM hormigon

INNER JOIN empresas ON hormigon.fk_empresa = empresas.idEmpresa
INNER JOIN proveedores ON hormigon.fk_proveedor = proveedores.idProveedor
where hormigon.estado=1;";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function insert_hormigon(
        $tipo_hormigon,
     $tipo_asentamiento,
     $pendiente,
     $ordenada_origen,
     $fk_empresa,
     $descripcion,
     $fk_proveedor)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO hormigon (
            idHormigon,
            tipo_hormigon,
            tipo_asentamiento,
            pendiente,
            ordenada_origen,
            fk_empresa,
            descripcion,
            fk_proveedor,
            estado
            ) VALUES (NULL,?,?,?,?,?,?,?,1);";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipo_hormigon);
        $sql->bindValue(2, $tipo_asentamiento);
        $sql->bindValue(3, $pendiente);
        $sql->bindValue(4, $ordenada_origen);
        $sql->bindValue(5, $fk_empresa);
        $sql->bindValue(6, $descripcion);
        $sql->bindValue(7, $fk_proveedor);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_id_hormigon_insert($hormigon, $descripcion)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT idHormigon FROM hormigon WHERE hormigon = ? AND  descripcion = ?;";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $hormigon);
        $sql->bindValue(2, $descripcion);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function get_hormigon_x_id($idHormigon)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT
        hormigon.idHormigon,
        hormigon.tipo_hormigon,
        hormigon.tipo_asentamiento,
        hormigon.pendiente,
        hormigon.ordenada_origen,
        hormigon.fk_empresa,
        hormigon.descripcion,
        hormigon.fk_proveedor,
        empresas.nombreEmpresa,
        proveedores.nombreProveedor
        FROM hormigon

INNER JOIN empresas ON hormigon.fk_empresa = empresas.idEmpresa
INNER JOIN proveedores ON hormigon.fk_proveedor = proveedores.idProveedor
where hormigon.idHormigon=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idHormigon);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function update_hormigon(
        $tipo_hormigon,
        $tipo_asentamiento,
        $pendiente,
        $ordenada_origen,
        $fk_empresa,
        $descripcion,
        $fk_proveedor,
        $idHormigon)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE hormigon set
            tipo_hormigon=?,
            tipo_asentamiento=?,
            pendiente=?,
            ordenada_origen=?,
            fk_empresa=?,
            descripcion=?,
            fk_proveedor=?
            WHERE
            idHormigon = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $tipo_hormigon);
        $sql->bindValue(2, $tipo_asentamiento);
        $sql->bindValue(3, $pendiente);
        $sql->bindValue(4, $ordenada_origen);
        $sql->bindValue(5, $fk_empresa);
        $sql->bindValue(6, $descripcion);
        $sql->bindValue(7, $fk_proveedor);
        $sql->bindValue(8, $idHormigon);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
    public function delete_hormigon($idHormigon)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE hormigon SET estado= 2
        where idHormigon=?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $idHormigon);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }
}

?>
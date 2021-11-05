<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Proveedor.php");
 
  $proveedor = new Proveedor();
  
  function listar_proveedors( $proveedor){

    $proveedores=$proveedor->obtener_proveedores();
   
  return   $proveedores;
  }

  $aProveedor = listar_proveedors( $proveedor); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Umbral.php");
 
  $umbral = new Umbral();
  
  function listar_umbrales( $umbral){

    $umbrales=$umbral->obtener_umbrales();
   
  return   $umbrales;
  }

  $aUmbral = listar_umbrales( $umbral); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Hormigon.php");
 
  $hormigon = new Hormigon();
  
  function listar_hormigons( $hormigon){

    $hormigons=$hormigon->obtener_hormigon();
   
  return   $hormigons;
  }

  $aHormigon = listar_hormigons( $hormigon); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
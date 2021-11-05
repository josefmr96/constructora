<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Domicilio.php");
 
  $domicilio = new Domicilio();
  
  function listar_provincias( $domicilio){

    $domicilios=$domicilio->obtener_provincias();
   
  return   $domicilios;
  }

  $aDomicilio = listar_provincias( $domicilio); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
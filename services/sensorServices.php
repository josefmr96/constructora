<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Sensor.php");
 
  $sensor = new Sensor();
  
  function listar_sensors( $sensor){

    $sensores=$sensor->obtener_sensores();
   
  return   $sensores;
  }

  $aSensor = listar_sensors( $sensor); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Alarma.php");
 
  $alarma = new Alarma();
  
  function listar_alarmas( $alarma){

    $alarmas=$alarma->obtener_alarmas();
   
  return   $alarmas;
  }

  $aAlarma = listar_alarmas( $alarma); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
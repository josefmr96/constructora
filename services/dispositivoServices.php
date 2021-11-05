<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Dispositivo.php");
 
  $dispositivo = new Dispositivo();
  
  function listar_dispositivos( $dispositivo){

    $dispositivos=$dispositivo->obtener_dispositivos();
   
  return   $dispositivos;
  }

  $aDispositivo = listar_dispositivos( $dispositivo); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
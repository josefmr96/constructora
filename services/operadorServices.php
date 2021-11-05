<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Operador.php");
 
  $operador = new Operador();
  
  function listar_operadores( $operador){

    $operadores=$operador->obtener_operadores();
   
  return   $operadores;
  }

  $aOperador = listar_operadores( $operador); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
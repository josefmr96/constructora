<?php
  require_once("../../config/conexion.php"); 
  require_once("../../models/Empresa.php");
 
  $empresa = new empresa();
  
  function listar_empresas( $empresa){

    $empresas=$empresa->obtener_empresas();
   
  return   $empresas;
  }

  $aEmpresa = listar_empresas( $empresa); // guardamos los datos de la funcion en una variable para utilizarla luego
 


?>
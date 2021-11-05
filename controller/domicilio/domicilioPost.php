<?php 
 require_once("../../config/conexion.php");

 require_once("../../models/Domicilio.php");
 $domicilio = new Domicilio();

 $idficha = $_GET['id'];
 
   if(intval($_GET['id'])){
    $domicilio->insertar_domicilio(
        $_POST['direccion'],
        $_POST['fk_localidad'],
        $_POST['fk_provincia'],
        $_POST['codigo_postal']
    ); 
    



        
      
   
    
   }

    
        
      
    

 


?>

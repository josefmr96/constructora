<?php 
 require_once("../config/conexion.php");

 require_once("../models/Domicilio.php");
 $domicilio = new Domicilio();

 switch ($_GET['op']) {
     
case "eliminar": //Eliminar domicilio
    $domicilio->delete_domicilio($_POST["iddomicilio"]);
break;

}
?>
<?php
require_once("../../config/conexion.php");
require_once("../../models/Domicilio.php");

if($_GET['id']){
   
    //RECIBIMOS EL ID DE LA PROVINCIA SELECCIONADA POR PARAMETROS
    // FILTRAMOS LA LOCALIDAD POR LA PROVINCIA SELECCIONADA
    function localidad(){
        $id= intval($_GET['id']);
        $domicilio = new Domicilio();
    
        $datos= $domicilio->obtener_localidades($id);
        $data= Array();
                foreach($datos as $row){
                   echo $listas = '<option value='.$row["idLocalidad"].' selected>'.$row["localidad"].'</option>';
                }
                
    }
    echo localidad();
    
   
}

?>
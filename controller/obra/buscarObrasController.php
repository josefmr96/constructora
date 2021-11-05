<?php
require_once("../../config/conexion.php");
require_once("../../models/obra.php");

if($_GET['id']){
   
    //RECIBIMOS EL ID DE LA PROVINCIA SELECCIONADA POR PARAMETROS
    // FILTRAMOS LA LOCALIDAD POR LA PROVINCIA SELECCIONADA
    function obras(){
        $id= intval($_GET['id']);
        $obra = new obra();
    
        $datos= $obra->obtener_id_obras_elementos($id);
        $data= Array();
                foreach($datos as $row){
                   echo $listas = '<option value='.$row["idObra"].' selected>'.$row["nombreObra"].'</option>';
                }
                
    }
    echo obras();
    
   
}

?>
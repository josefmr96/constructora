<?php
require_once("../../config/conexion.php");
require_once("../../models/Sensor.php");

if($_GET['id']){
   
    //RECIBIMOS EL ID DE LA PROVINCIA SELECCIONADA POR PARAMETROS
    // FILTRAMOS LA LOCALIDAD POR LA PROVINCIA SELECCIONADA
    function sensores(){
        $id= intval($_GET['id']);
        $sensor = new sensor();
    
        $datos= $sensor->obtener_id_sensor_elementos($id);
        $data= Array();
                foreach($datos as $row){
                   echo $listas = '<option value='.$row["idSensor"].' selected>'.$row["numero_serie"].'</option>';
                }
                
    }
    echo sensores();
    
   
}

?>
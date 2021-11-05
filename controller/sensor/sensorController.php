<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Sensor.php");
    require_once("../../services/sensorServices.php");
    $sensor = new Sensor();

    switch($_GET["op"]){ //sensor
       
        case "guardaryeditar": //en caso de que sea guardar o editar

            if(empty($_POST["idSensor"])){ 
                if(isset($_GET["id"])){
                    $sensor->insertar_sensor(
                        $_POST["nombreEmpresa"],
                        $_POST["numero_serie"],
                        intval($_GET["id"]));  
                }else{
                    $sensor->insertar_sensores(
                        $_POST["nombreEmpresa"],
                        $_POST["numero_serie"]);  
                }    
            
            }else {
                $sensor->update_sensores( //caso contrario se actualiza el usuario seleccionado
                    $_POST["idSensor"],
                    $_POST["nombreEmpresa"],
                    $_POST["numero_serie"]);
            }
        break;
        case "listar": //listado de usuarios en grilla
            if(isset($_GET["id"])){
                $datos=$sensor-> obtener_id_sensor_elementos($_GET["id"]); //obtener todos los usuarios
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["nombreEmpresa"];
                    $sub_array[] = $row["numero_serie"];
                    if ( $row["disponible"]=="1"){// si el rol es igual a 1 es un usuario
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                        //botones dinamicos para Editar y elimnar
                    $sub_array[] = '<button type="button" onClick="editar('.$row["idSensor"].');"  id="'.$row["idSensor"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["idSensor"].');"  id="'.$row["idSensor"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $data[] = $sub_array;
                }
    
                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
            }else{
                $datos=$sensor->obtener_sensores(); //obtener todos los usuarios
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["nombreEmpresa"];
                    $sub_array[] = $row["numero_serie"];
                    if ( $row["disponible"]=="1"){// si el rol es igual a 1 es un usuario
                        $sub_array[] = '<span class="label label-pill label-success">SI</span>';
                    }else{
                        $sub_array[] = '<span class="label label-pill label-danger">NO</span>';
                    }
                        //botones dinamicos para Editar y elimnar
                    $sub_array[] = '<button type="button" onClick="editar('.$row["idSensor"].');"  id="'.$row["idSensor"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["idSensor"].');"  id="'.$row["idSensor"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $data[] = $sub_array;
                }
    
                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
            }
            
              
           
       
              
           
           
        break;


        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
        $datos=$sensor->get_sensores_x_id($_POST["idSensor"]);  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row) //Llenar datos de modal
            {
                $output["idSensor"] = $row["idSensor"];
                $output["fk_empresa"] = $row["fk_empresa"];
                $output["nombreEmpresa"] = $row["nombreEmpresa"];
                $output["numero_serie"] = $row["numero_serie"];
            }
            echo json_encode($output); //pasar datos a formato json
        }   
    break;
    case "eliminar": //Eliminar usuarios
        $sensor->delete_sensor($_POST["idSensor"]);
    break;

    

   

   
 
    }
?>
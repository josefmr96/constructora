<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Dispositivo.php");
    $dispositivo = new Dispositivo();

    switch($_GET["op"]){ //dispositivo
        case "guardaryeditar": //en caso de que sea guardar o editar

            if(empty($_POST["idDispositivo"])){     //si viene vacio el id se inserta
                $dispositivo->insertar_dispositivo(
                    $_POST["fk_sensor"],
                    $_POST["dispositivo"]);     
            }
            else {
                $dispositivo->update_dispositivos( //caso contrario se actualiza el usuario seleccionado
                    $_POST["idDispositivo"],
                    $_POST["fk_sensor"],
                    $_POST["dispositivo"]);
            }
        break;
     
        case "listar": //listado de usuarios en grilla
       
            $datos=$dispositivo->obtener_dispositivos(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["dispositivo"];
                $sub_array[] = '   <a href="../Sensores?id='.$row["idDispositivo"].'" class="btn btn-inline btn-info btn-sm ladda-button"><i class="font-icon font-icon-tablet"></i>    </a>';
                    //botones dinamicos para Editar y elimnar
                $sub_array[] = '<button type="button" onClick="editar('.$row["idDispositivo"].');"  id="'.$row["idDispositivo"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["idDispositivo"].');"  id="'.$row["idDispositivo"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }
     

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;
     
    
        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
        $datos=$dispositivo->get_dispositivos_x_id($_POST["idDispositivo"]);  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row) //Llenar datos de modal
            {
                $output["idDispositivo"] = $row["idDispositivo"];
                $output["fk_sensor"] = $row["fk_sensor"];
                $output["numero_serie"] = $row["numero_serie"];
                $output["dispositivo"] = $row["dispositivo"];
            }
            echo json_encode($output); //pasar datos a formato json
        }   
    break;

    case "eliminar": //Eliminar usuarios
        $dispositivo->delete_dispositivo($_POST["idDispositivo"]);
    break;

   

   
 
    }
?>
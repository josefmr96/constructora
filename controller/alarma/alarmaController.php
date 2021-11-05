<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Alarma.php");
    $alarma = new Alarma();

    switch($_GET["op"]){ //alarma
        case "guardaryeditar": //en caso de que sea guardar o editar

            if(empty($_POST["idAlarma"])){     //si viene vacio el id se inserta
                $alarma->insert_alarmas(
                    $_POST["nombreEmpresa"],
                    $_POST["descripcion"],    
                    $_POST["operador"],    
                    $_POST["umbral"],    
                    $_POST["correo"],    
                    $_POST["nombreProveedor"]);     
            }
            else {
               
                $alarma->update_alarmas( //caso contrario se actualiza el usuario seleccionado
                    $_POST["nombreEmpresa"],
                    $_POST["descripcion"],    
                    $_POST["operador"],    
                    $_POST["umbral"],    
                    $_POST["correo"],    
                    $_POST["nombreProveedor"],
                    $_POST["idAlarma"]);
                  
            }
        break;

        case "listar": //listado de usuarios en grilla
            $datos=$alarma->obtener_alarmas(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombreEmpresa"];
                $sub_array[] = $row["nombreProveedor"];
                $sub_array[] = $row["operador"];
                $sub_array[] = $row["umbral"];
                $sub_array[] = $row["correo"];
                $sub_array[] = $row["descripcion"];
                    //botones dinamicos para Editar y elimnar
                $sub_array[] = '<button type="button" onClick="editar('.$row["idAlarma"].');"  id="'.$row["idAlarma"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["idAlarma"].');"  id="'.$row["idAlarma"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        case "eliminar": //Eliminar usuarios
            $alarma->delete_alarmas($_POST["idAlarma"]);
        break;

        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
            $datos=$alarma->get_alarmas_x_id($_POST["idAlarma"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row) //Llenar datos de modal
                {
                    $output["idAlarma"] = $row["idAlarma"];
                    $output["fk_proveedor"] = $row["fk_proveedor"];
                    $output["fk_empresa"] = $row["fk_empresa"];
                    $output["fk_umbral"] = $row["fk_umbral"];
                    $output["fk_operador"] = $row["fk_operador"];
                    $output["nombreEmpresa"] = $row["nombreEmpresa"];
                    $output["operador"] = $row["operador"];
                    $output["umbral"] = $row["umbral"];
                    $output["correo"] = $row["correo"];
                    $output["nombreProveedor"] = $row["nombreProveedor"];
                    $output["descripcion"] = $row["descripcion"];
                }
                echo json_encode($output); //pasar datos a formato json
            }   
        break;


    

   

   
 
    }
?>
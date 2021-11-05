<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Hormigon.php");
    $hormigon = new Hormigon();

    switch($_GET["op"]){ //hormigon
        case "guardaryeditar": //en caso de que sea guardar o editar

            if(empty($_POST["idHormigon"])){     //si viene vacio el id se inserta
                $hormigon->insert_hormigon(
                    $_POST["tipo_hormigon"],    
                    $_POST["tipo_asentamiento"],
                    $_POST["pendiente"],  
                    $_POST["ordenada_origen"],    
                    $_POST["nombreEmpresa"],
                    $_POST["descripcion"],
                    $_POST["nombreProveedor"]);     
            }
            else {
               
                $hormigon->update_hormigon( //caso contrario se actualiza el usuario seleccionado
                    $_POST["tipo_hormigon"],    
                    $_POST["tipo_asentamiento"],
                    $_POST["pendiente"],  
                    $_POST["ordenada_origen"],    
                    $_POST["nombreEmpresa"],
                    $_POST["descripcion"],
                    $_POST["nombreProveedor"],
                $_POST["idHormigon"]);
                  
            }
        break;

        case "listar": //listado de usuarios en grilla
           
                $datos=$hormigon->obtener_hormigon(); //obtener todos los usuarios
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                
                    $sub_array[] = $row["tipo_asentamiento"];
                    $sub_array[] = $row["tipo_hormigon"];
                    $sub_array[] = $row["ordenada_origen"];
                    $sub_array[] = $row["pendiente"];
                    $sub_array[] = $row["descripcion"];
                    $sub_array[] = $row["nombreEmpresa"];
                    $sub_array[] = $row["nombreProveedor"];
                   
                        //botones dinamicos para Editar y elimnar
                    $sub_array[] = '<button type="button" onClick="editar('.$row["idHormigon"].');"  id="'.$row["idHormigon"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["idHormigon"].');"  id="'.$row["idHormigon"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
        $datos=$hormigon->get_hormigon_x_id($_POST["idHormigon"]);  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row) //Llenar datos de modal
            {
                $output["idHormigon"] = $row["idHormigon"];
                $output["fk_proveedor"] = $row["fk_proveedor"];
                $output["fk_empresa"] = $row["fk_empresa"];
                $output["nombreEmpresa"] = $row["nombreEmpresa"];
                $output["tipo_hormigon"] = $row["tipo_hormigon"];
                $output["tipo_asentamiento"] = $row["tipo_asentamiento"];
                $output["ordenada_origen"] = $row["ordenada_origen"];
                $output["pendiente"] = $row["pendiente"];
                $output["nombreProveedor"] = $row["nombreProveedor"];
                $output["nombreEmpresa"] = $row["nombreEmpresa"];
                $output["descripcion"] = $row["descripcion"];
            }
            echo json_encode($output); //pasar datos a formato json
        }   
    break;
    case "eliminar": //Eliminar usuarios
        $hormigon->delete_hormigon($_POST["idHormigon"]);
    break;


   

   
 
    }
?>
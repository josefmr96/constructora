<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Operador.php");
    $operador = new Operador();

    switch($_GET["op"]){ //operador
        case "guardaryeditar": //en caso de que sea guardar o editar

            if(empty($_POST["idOperador"])){     //si viene vacio el id se inserta
                $operador->insert_operador(
                    $_POST["operador"],
                    $_POST["descripcion"]);     
            }
            else {
                $operador->update_operador( //caso contrario se actualiza el usuario seleccionado
                    $_POST["idOperador"],
                    $_POST["operador"],
                    $_POST["descripcion"]);
            }
        break;

        case "listar": //listado de usuarios en grilla
            $datos=$operador->obtener_operadores(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["operador"];
                $sub_array[] = $row["descripcion"];
                    //botones dinamicos para Editar y elimnar
                $sub_array[] = '<button type="button" onClick="editar('.$row["idOperador"].');"  id="'.$row["idOperador"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["idOperador"].');"  id="'.$row["idOperador"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $operador->delete_operador($_POST["idOperador"]);
        break;

        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
            $datos=$operador->get_operador_x_id($_POST["idOperador"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row) //Llenar datos de modal
                {
                    $output["idOperador"] = $row["idOperador"];
                    $output["operador"] = $row["operador"];
                    $output["descripcion"] = $row["descripcion"];
                }
                echo json_encode($output); //pasar datos a formato json
            }   
        break;


    

   

   
 
    }
?>
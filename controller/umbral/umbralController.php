<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Umbral.php");
    $umbral = new Umbral();

    switch($_GET["op"]){ //umbral
        case "guardaryeditar": //en caso de que sea guardar o editar

            if(empty($_POST["idUmbral"])){     //si viene vacio el id se inserta
                $umbral->insert_umbral(
                    $_POST["umbral"],
                    $_POST["descripcion"]);     
            }
            else {
                $umbral->update_umbral( //caso contrario se actualiza el usuario seleccionado
                    $_POST["idUmbral"],
                    $_POST["umbral"],
                    $_POST["descripcion"]);
            }
        break;

        case "listar": //listado de usuarios en grilla
            $datos=$umbral->obtener_umbrales(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["umbral"];
                $sub_array[] = $row["descripcion"];
                    //botones dinamicos para Editar y elimnar
                $sub_array[] = '<button type="button" onClick="editar('.$row["idUmbral"].');"  id="'.$row["idUmbral"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["idUmbral"].');"  id="'.$row["idUmbral"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $umbral->delete_umbral($_POST["idUmbral"]);
        break;

        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
            $datos=$umbral->get_umbral_x_id($_POST["idUmbral"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row) //Llenar datos de modal
                {
                    $output["idUmbral"] = $row["idUmbral"];
                    $output["umbral"] = $row["umbral"];
                    $output["descripcion"] = $row["descripcion"];
                }
                echo json_encode($output); //pasar datos a formato json
            }   
        break;


    

   

   
 
    }
?>
<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Elemento.php");
    $elemento = new Elemento();

    switch($_GET["op"]){ //elemento
        case "guardaryeditar": //en caso de que sea guardar o editar
            $dt = new DateTime( $_POST["fecha_hormigonado"]);
        
            if(empty($_POST["idElemento"])){
         

              $insertar= $elemento->insertar_elementos(
                 
                    $_POST["numero_remito"],
                    $_POST["elemento"],
                    $_POST["fk_obra"],
                    $_POST["nombreEmpresa"],
                    $_POST["hormigon"],
                    $_POST["alarmas"],
                    $_POST["dispositivos"],
                    $_POST["hora"],
                    $_POST["fecha_hormigonado"],
                $_POST["fk_sensor"]);
             
               
            }else{
                if(isset($_POST["sensorElse"])){
                    $actualizar= $elemento->update_elementos(
                 
                        $_POST["numero_remito"],
                    $_POST["elemento"],
                    $_POST["obraInput"],
                    $_POST["empresaInput"],
                    $_POST["hormigon"],
                    $_POST["alarmas"],
                    $_POST["dispositivos"],
                    $_POST["hora"],
                    $_POST["fecha_hormigonado"],
                $_POST["sensorElse"],
            intval($_POST["idElemento"]));
                }else{
                    $actualizarElse= $elemento->update_elementos(
                 
                        $_POST["numero_remito"],
                    $_POST["elemento"],
                    $_POST["obraInput"],
                    $_POST["empresaInput"],
                    $_POST["hormigon"],
                    $_POST["alarmas"],
                    $_POST["dispositivos"],
                    $_POST["hora"],
                    $_POST["fecha_hormigonado"],
                $_POST["fk_sensor"],
            intval($_POST["idElemento"]));
                  
                }
       
                
        
       
            }
          
        break;
     

        case "listar": //listado de usuarios en grilla
            if(isset($_GET["id"])){
                $datos=$elemento->obtener_elementos_obras($_GET["id"]); //obtener todos los usuarios
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["nombreEmpresa"];
                    $sub_array[] = $row["nombreObra"];
                    $sub_array[] = $row["elemento"];
                    $sub_array[] = $row["numero_remito"];
                    $sub_array[] = $row["tipo_hormigon"];
                    $sub_array[] = $row["descripcion"];
                    $sub_array[] = $row["dispositivo"];
                    $sub_array[] = $row["fecha_hormigonado"] .' '.$row["hora"];
                        //botones dinamicos para Editar y elimnar
                    $sub_array[] = '<button type="button" onClick="editar('.$row["idElemento"].');"  id="'.$row["idElemento"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["idElemento"].');"  id="'.$row["idElemento"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                    $data[] = $sub_array;
                }
    
                $results = array(
                    "sEcho"=>1,
                    "iTotalRecords"=>count($data),
                    "iTotalDisplayRecords"=>count($data),
                    "aaData"=>$data);
                echo json_encode($results);
            }else{
                $datos=$elemento->obtener_elementos(); //obtener todos los usuarios
                $data= Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["nombreEmpresa"];
                    $sub_array[] = $row["nombreObra"];
                    $sub_array[] = $row["elemento"];
                    $sub_array[] = $row["numero_remito"];
                    $sub_array[] = $row["tipo_hormigon"];
                    $sub_array[] = $row["descripcion"];
                    $sub_array[] = $row["dispositivo"];
                    $sub_array[] = $row["fecha_hormigonado"] .' '.$row["hora"];
                        //botones dinamicos para Editar y elimnar
                    $sub_array[] = '<button type="button" onClick="editar('.$row["idElemento"].');"  id="'.$row["idElemento"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                    $sub_array[] = '<button type="button" onClick="eliminar('.$row["idElemento"].');"  id="'.$row["idElemento"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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

        case "eliminar": //Eliminar domicilio
            $elemento->delete_elementos(intval($_POST["idElemento"]));
        break;

        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
        $datos=$elemento->mostrar_elementos_x_id($_POST["idElemento"]);  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row) //Llenar datos de modal
            {
                $output["idElemento"] = $row["idElemento"];
                $output["elemento"] = $row["elemento"];
                $output["numero_remito"] = $row["numero_remito"];
                $output["hora"] = $row["hora"];
                $output["fecha_hormigonado"] = $row["fecha_hormigonado"];
                $output["numero_serie"] = $row["numero_serie"];
                $output["fk_empresa"] = $row["fk_empresa"];
                $output["fk_obra"] = $row["fk_obra"];
                $output["fk_alarmas"] = $row["fk_alarmas"];
                $output["fk_dispositivo"] = $row["fk_dispositivo"];
                $output["fk_sensor"] = $row["fk_sensor"];
                $output["fk_hormigon"] = $row["fk_hormigon"];
                $output["nombreObra"] = $row["nombreObra"];
                $output["nombreEmpresa"] = $row["nombreEmpresa"];
                $output["descripcion"] = $row["descripcion"];
                $output["dispositivo"] = $row["dispositivo"];
                $output["tipo_hormigon"] = $row["tipo_hormigon"];
            }
            echo json_encode($output); //pasar datos a formato json
        }   
    break;

   

   
 
    }
?>
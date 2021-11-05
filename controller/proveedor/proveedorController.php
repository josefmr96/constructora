<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Proveedor.php");
    require_once("../../models/Domicilio.php");
    $proveedor = new Proveedor();
    $domicilio = new Domicilio();

    switch($_GET["op"]){ //operador
        case "guardaryeditar": //en caso de que sea guardar o editar
            if(empty($_POST["idDireccion"])){


            $domicilio->insertar_domicilio(
                $_POST['direccion'],
                $_POST['fk_localidad'],
                $_POST['fk_provincia'],
                $_POST['codigo_postal']
            ); //insertamos el domicilio
          
            $domicilioId =  $domicilio->obtener_id_domicilio( $_POST['direccion'],
            $_POST['fk_localidad'],
            $_POST['fk_provincia'],
            $_POST['codigo_postal']);	
            //obtenemos el id insertado
         
        $idDomicilio = array_shift($domicilioId[0]);
            //lo separamos del array
                if(isset($idDomicilio)){
                 
                    $proveedor->insertar_proveedor(
                        $_POST['nombreProveedor'],
                        $idDomicilio,
                        $_POST['correo'],
                        $_POST['cuil'],
                        $_POST['telefono'] );
                        //insertamos la proveedor Editar
                     
                  
                    $proveedorId =   $proveedor->obtener_id_proveedor( $idDomicilio);
                    $idproveedorInsert =  array_shift( $proveedorId[0]);
                    $domicilio->insertar_proveedor_domicilio($idproveedorInsert,  $idDomicilio);
                     
                }  
                
            }else{

                if(  $_POST['fk_localidad'] != NULL){
                    $domicilio->update_empresa_domicilio( //caso contrario se actualiza el usuario seleccionado
                        $_POST['direccion'],
                        $_POST['fk_localidad'],
                        $_POST['fk_provincia'],
                        $_POST['codigo_postal'],
                        $_POST['idDireccion']
                    );
                }else{
                    $domicilio->update_empresa_domicilio( //caso contrario se actualiza el usuario seleccionado
                        $_POST['direccion'],
                        $_POST['localidadElse'],
                        $_POST['fk_provincia'],
                        $_POST['codigo_postal'],
                        $_POST['idDireccion']);
                };
 
    $proveedor->update_proveedor_modal(
    $_POST['correo'],
    $_POST['cuil'],
    $_POST['telefono'],
    $_POST['idDireccion']);
            }
         
        break;

        case "listar": //listado de usuarios en grilla
            $datos=$proveedor->listar_proveedores(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombreProveedor"];
                $sub_array[] = $row["correo"];
                $sub_array[] = $row["cuil"];
                $sub_array[] = $row["telefono"];
                $sub_array[] = $row["direccion"];
                $sub_array[] = $row["provincia"];
                $sub_array[] =''.$row["localidad"].'('.$row["codigo_postal"].')';
                    //botones dinamicos para Editar y elimnar
                $sub_array[] = '<button type="button" onClick="editar('.$row["fk_direccion"].');"  id="'.$row["fk_direccion"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["fk_direccion"].');"  id="'.$row["fk_direccion"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        // case "eliminar": //Eliminar usuarios
        //     $proveedor->delete_proveedor($_POST["idproveedor"]);
        // break;

        case "mostrar"; // Obtenemos los datos del usuario que se va a actualizar
            $datos=$proveedor->mostrar_proveedor_porId($_POST["idDireccion"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row) //Llenar datos de modal
                {
                    $output["idDireccion"] = $row["idDireccion"];
                    $output["nombreProveedor"] = $row["nombreProveedor"];
                    $output["correo"] = $row["correo"];
                    $output["cuil"] = $row["cuil"];
                    $output["telefono"] = $row["telefono"];
                    $output["direccion"] = $row["direccion"];
                    $output["fk_provincia"] = $row["fk_provincia"];
                    $output["fk_localidad"] = $row["fk_localidad"];
                    $output["provincia"] = $row["provincia"];
                    $output["localidad"] = $row["localidad"];
                    $output["codigo_postal"] = $row["codigo_postal"];
                }
                echo json_encode($output); //pasar datos a formato json
            }   
        break;
        case "eliminar": //Eliminar domicilio
            $proveedor->delete_proveedor(intval($_POST["idDireccion"]));
        break;

    

   

   
 
    }
?>
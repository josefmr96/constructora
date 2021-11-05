<?php
    require_once("../../config/conexion.php");
    require_once("../../models/Obra.php");
    require_once("../../models/Domicilio.php");
    $obra = new Obra();
    $domicilio = new Domicilio();
    switch($_GET["op"]){ //obra
        case "guardaryeditar": //en caso de que sea guardar o editar
            if(empty($_POST["idDireccion"])){


                $domicilio->insertar_domicilio_obra(
                    $_POST['direccion'],
                    $_POST['fk_localidad'],
                    $_POST['fk_provincia'],
                    $_POST['codigo_postal'],
                    $_POST['nombreEmpresa']
            ); //insertamos el obra
          
            $domicilioId =  $domicilio->obtener_id_domicilio( $_POST['direccion'],
            $_POST['fk_localidad'],
            $_POST['fk_provincia'],
            $_POST['codigo_postal']);		
            //obtenemos el id insertado
         
            $idDomicilio = array_shift($domicilioId[0]);
            //lo separamos del array
                if(isset($idDomicilio)){
                 
                    $obra->insertar_obras(
                        $_POST['nombreObra'],
                        $_POST['comentario'],
                        $idDomicilio, 
                        $_POST['nombreEmpresa']);
                        //insertamos la empresa Editar
                     
                  
                    $obraId =   $obra->obtener_id_obra( $idDomicilio);
                    $idObraInsert =  array_shift( $obraId[0]);
                    $domicilio->insertar_obra_domicilio($idObraInsert,  $idDomicilio);
                     
                }  
                     
             
                
            }else{
                if($_POST['fk_localidad'] === NULL){
                    
                    $domicilio->update_empresa_domicilio( //caso contrario se actualiza el usuario seleccionado
                        $_POST['direccion'],
                        $_POST['localidadElse'],
                        $_POST['fk_provincia'],
                        $_POST['codigo_postal'],
                        $_POST['idDireccion']
                    );
               
                   
                }else{
                    $domicilio->update_empresa_domicilio( //caso contrario se actualiza el usuario seleccionado
                        $_POST['direccion'],
                        $_POST['fk_localidad'],
                        $_POST['fk_provincia'],
                        $_POST['codigo_postal'],
                        $_POST['idDireccion']
                    );  
                  
                       
                };
 
                $obra->update_obra_domicilio( 
                    $_POST['nombreObra'],
                    $_POST['comentario'],
                    $_POST['idDireccion']
                );
            }
         
        break;


        case "listar": //listado de usuarios en grilla
            
            $datos=$obra->obtener_obras(); //obtener todos los usuarios
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["nombreObra"];
                $sub_array[] = $row["nombreEmpresa"];
                $sub_array[] = $row["comentario"];
                $sub_array[] = $row["localidad"];
                $sub_array[] = $row["provincia"];
                $sub_array[] = $row["codigo_postal"];
                    //botones dinamicos para Editar y elimnar
                    $sub_array[] = '   <a href="../Elementos?id='.$row["idObra"].'" class="btn btn-inline btn-info btn-sm ladda-button"><i class="font-icon font-icon-tablet"></i>    </a>';
                $sub_array[] = '<button type="button" onClick="editar('.$row["idDireccion"].');"  id="'.$row["idDireccion"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["idDireccion"].');"  id="'.$row["idDireccion"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
        $datos=$obra->mostrar_obra_porId($_POST["idDireccion"]);  
        if(is_array($datos)==true and count($datos)>0){
            foreach($datos as $row) //Llenar datos de modal
            {
                $output["idDireccion"] = $row["idDireccion"];
                $output["nombreEmpresa"] = $row["nombreEmpresa"];
                $output["direccion"] = $row["direccion"];
                $output["fk_provincia"] = $row["fk_provincia"];
                $output["fk_localidad"] = $row["fk_localidad"];
                $output["provincia"] = $row["provincia"];
                $output["localidad"] = $row["localidad"];
                $output["codigo_postal"] = $row["codigo_postal"];
                $output["nombreObra"] = $row["nombreObra"];
                $output["comentario"] = $row["comentario"];
            }
            echo json_encode($output); //pasar datos a formato json
        }   
    break;
    case "eliminar": //Eliminar domicilio
        $obra->delete_obras(intval($_POST["idDireccion"]));
    break;
    

   

   
 
    }
?>
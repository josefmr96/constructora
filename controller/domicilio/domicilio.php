<?php 
 require_once("../config/conexion.php");

 require_once("../models/Domicilio.php");
 $domicilio = new Domicilio();
 
 $idficha = $_GET['id'];
 
 
   if(intval($_GET["id"])){

    $datos=$domicilio->get_domicilio($idficha); 
    $data= Array();
    foreach($datos as $row){
        $sub_array = array();
        $sub_array[] = $row["calle"];
        $sub_array[] = $row["numeroCalle"];
        $sub_array[] = $row["piso"];
        $sub_array[] = $row["departamento"];
        $sub_array[] = $row["provincia"];
        $sub_array[] = $row["localidad"];
        $sub_array[] = $row["codigo_postal"];

      
            //botones dinamicos para Editar y elimnar
            if($row["iddomicilio"] ==$row["fk_domicilio"] ){
                $sub_array[] =  $sub_array[] = '<p>Principal </p>
                <a type="button" href="../DetalleCliente?id='.$idficha.'"  id="'.$idficha.'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></a>';
            }else{
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["iddomicilio"].');"  id="'.$row["iddomicilio"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
            }
       
        $data[] = $sub_array; 
      
  

        
      
   
    
   }
   $results = array(
    "sEcho"=>1,
    "iTotalRecords"=>count($data),
    "iTotalDisplayRecords"=>count($data),
    "aaData"=>$data);
echo json_encode($results);


}  


    
        
      
    

 


?>

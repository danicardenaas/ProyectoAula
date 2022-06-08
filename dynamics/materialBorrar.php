<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $material = (isset($_POST['material']) && $_POST["material"] != "")? $_POST['material']:false;
    $reportar = (isset($_POST['reportar']) && $_POST["reportar"] != "")? $_POST['reportar']:false;
    if($reportar ==0)
    {
        $peticion = "DELETE FROM archivostablon WHERE ID_material = $material";   
            $query = mysqli_query( $conexion, $peticion); 
            $peticion = "DELETE FROM material  WHERE ID_material = $material";   
    }
    else if($reportar==1){
        $peticion = "UPDATE material SET reportado=1 WHERE ID_material = $material"; 
    }
    else if($reportar==2){
        $peticion = "UPDATE material SET reportado=0 WHERE ID_material = $material"; 
    }
   
    $query = mysqli_query( $conexion, $peticion); 
  
    echo json_encode($query);
?>
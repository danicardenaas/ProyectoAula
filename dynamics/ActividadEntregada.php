<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_actividad = (isset($_POST['id_actividad']) && $_POST["id_actividad"] != "")? $_POST['id_actividad'] : false;
    $id_usuario= $_SESSION["ID_usuario"];
    $archivos=[];
    $peticion = "SELECT * FROM act_Entrega WHERE id_actividad = $id_actividad AND id_usuario = $id_usuario";
    $query = mysqli_query( $conexion, $peticion); 
    $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($datos !=null)
    {
            $id_entrega=$datos["ID_act_entrega"];
    
        $peticion = "SELECT * FROM archivos_entrega WHERE id_act_entrega = $id_entrega";
        $query = mysqli_query( $conexion, $peticion); 
        
        $archivos=array();
        $i=0;
        while($row=mysqli_fetch_assoc($query)){
            $archivos[$i]=$row;
            $i++;
        }
    }
   
    $respuesta=array("Info" => $datos, "archivos" => $archivos);


    echo json_encode($respuesta);
?>
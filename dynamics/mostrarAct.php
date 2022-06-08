<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_materia = (isset($_POST['id_materia']) && $_POST["id_materia"] != "")? $_POST['id_materia'] : false;
    $id_actividad = (isset($_POST['id_actividad']) && $_POST["id_actividad"] != "")? $_POST['id_actividad'] : false;
    $id_usuario= $_SESSION["ID_usuario"];

   
    if($id_materia)
    {   
         $peticion = "SELECT * FROM actividad WHERE id_materia = $id_materia ";
        $query = mysqli_query( $conexion, $peticion); 
        $i=0;
        while( $datos=mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
                $respuesta[$i]=$datos;
                
                $i++;
        }
    }
    if($id_actividad)
    {
        $peticion = "SELECT * FROM actividad WHERE id_actividad = $id_actividad ";
        $query = mysqli_query( $conexion, $peticion); 
        $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
        
        $archivos= array();
        $peticion = "SELECT * FROM ARCHIVOS WHERE id_actividad = $id_actividad ";
        $query = mysqli_query( $conexion, $peticion); 
        $i=0;
        while( $datos2=mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
                $archivos[$i]=$datos2;
                $i++;
        }
        $respuesta=array("datos" => $datos, "archivos" => $archivos);
    }
   
    
    echo json_encode($respuesta);
?>
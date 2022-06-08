<?php
    //Quitar de las archivos_entrega y tablas act_entrega 
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    $conexion= connect();
    session_start();
    $id_actividad = (isset($_POST['id_actividad']) && $_POST["id_actividad"] != "")? $_POST['id_actividad'] : false;
    $id_usuario= $_SESSION["ID_usuario"];

    $peticion = "SELECT * FROM act_entrega WHERE id_actividad = $id_actividad AND id_usuario= $id_usuario ";
    $query = mysqli_query( $conexion, $peticion); 
    $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($datos != null)
    {
         $id_act_entrega = $datos ["ID_act_entrega"];
        $peticion = "DELETE FROM archivos_entrega WHERE id_act_entrega = $id_act_entrega  ";
        $query = mysqli_query( $conexion, $peticion); 
        $peticion = "DELETE FROM act_entrega WHERE id_act_entrega = $id_act_entrega  ";
        $query = mysqli_query( $conexion, $peticion); 
    }
   
    echo json_encode($query);
?>
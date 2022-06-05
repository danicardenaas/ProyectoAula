<?php
    //Borrar de usuariohasevento y de evento
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id = (isset($_POST['id']) && $_POST["id"] != "")? $_POST['id'] : false;
    $peticion = "DELETE FROM usuariohasevento WHERE id_evento = $id";
    $query = mysqli_query( $conexion, $peticion); 
    $peticion = "DELETE FROM evento WHERE id_evento = $id";
    $query = mysqli_query( $conexion, $peticion); 
   
    $res = array ("ok" => $query);
    echo json_encode($res);
?>
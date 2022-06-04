<?php
    //uhc, phc, mhc, MATERIA
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_materia = (isset($_POST['id_materia']) && $_POST["id_materia"] != "")? $_POST['id_materia'] : false;
    $peticion = "DELETE FROM phc WHERE id_materia = $id_materia";
    $query = mysqli_query( $conexion, $peticion); 
    $peticion = "DELETE FROM uhm WHERE id_materia = $id_materia";
    $query = mysqli_query( $conexion, $peticion); 
    $peticion = "DELETE FROM mhc WHERE id_materia = $id_materia";
    $query = mysqli_query( $conexion, $peticion); 
    $peticion = "DELETE FROM materia WHERE id_materia = $id_materia";
    $query = mysqli_query( $conexion, $peticion); 
    $res = array ("ok" => $query);
    echo json_encode($res);
?>
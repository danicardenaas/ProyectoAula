<?php


    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    $conexion= connect();
    session_start();
    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    $peticion = "SELECT * from duda";
    $query = mysqli_query($conexion, $peticion);
    $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
    echo json_encode($datos);

?>
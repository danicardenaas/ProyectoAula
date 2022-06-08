<?php


    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    $conexion= connect();
    session_start();

    $rol= $_SESSION["rol"];

    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    $peticion = "SELECT * from duda NATURAL JOIN usuario";
    $query = mysqli_query($conexion, $peticion);
    
    $preguntas=array();
    $respuesta=array();
    $i=0;
    while($datos=mysqli_fetch_assoc($query)){
        $id_preg=$datos["ID_duda"];
        $preguntas[$i]=$datos;
        
        $peticion = "SELECT * from dudaresp NATURAL JOIN usuario WHERE ID_duda = $id_preg";
        $query2 = mysqli_query($conexion, $peticion);
        $x=0; 
        while($datos2=mysqli_fetch_assoc($query2)){
            $respuesta[$i][$x]=$datos2;
            $x++;
        }
        
       $i++; 
    }
    $mandar= array("preguntas" => $preguntas, "respuestas" => $respuesta, "rol" => $rol);
    echo json_encode($mandar);

?>
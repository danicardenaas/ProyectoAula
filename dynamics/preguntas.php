<?php


    include("./config.php"); 
    $conexion= connect();
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();

    $rol= $_SESSION["rol"];
    $user=$_SESSION["ID_usuario"];
    $termino = (isset($_POST['termino']) && $_POST["termino"] != "")? $_POST['termino'] : false;

    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    if(!$termino)
    {
        $peticion = "SELECT * from duda NATURAL JOIN usuario";
    }
    else{
        $peticion = "SELECT * from duda NATURAL JOIN usuario WHERE descripcion Like '%$termino%'";
    }
   
    $query = mysqli_query($conexion, $peticion);
    
    $preguntas=array(null);
    $respuesta=array(null);
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
    // Agrego rol
    // var_dump($preguntas);
    // Var_dump($respuesta);
    $mandar= array("preguntas" => $preguntas, "respuestas" => $respuesta, "rol"=> $rol, "usuario"=>$user);
    echo json_encode($mandar);

?>
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
    $id_materia = (isset($_POST['id_materia']) && $_POST["id_materia"] != "")? $_POST['id_materia'] : false;
    $id_usuario= $_SESSION["ID_usuario"];
    
    $peticion = "SELECT * FROM uhm WHERE id_usuario = $id_usuario AND id_materia = $id_materia ";
  
    $query = mysqli_query( $conexion, $peticion); 
    $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($datos != NULL)
    {
        //dejar entrar a la pestaña principal
        $resultados = array ("inscrito" => true);

    }
    else{
        //Si no esta ya inscrito mostrarle una pestaña para inscribirse
        $resultados = array ("inscrito" => false );
    }
   
   echo json_encode($resultados);


?>


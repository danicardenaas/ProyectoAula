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
    $procedimiento = (isset($_POST['fetch']) && $_POST["fetch"] != "")? $_POST['fetch'] : false;
   
    if($procedimiento ==1)
    {
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
            $peticion = "SELECT * FROM materia WHERE id_materia = $id_materia ";
            $query = mysqli_query( $conexion, $peticion); 
            $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
            $resultados = array ("inscrito" => false, "datosMat" => $datos );
        }
       
    }
    else if($procedimiento == 2)
    {
        $peticion = "INSERT INTO UHM (ID_usuario, ID_materia) VALUES ($id_usuario, $id_materia)";
        $res = mysqli_query($conexion, $peticion);
        if($res)
        {
            $resultados = array ("inscrito" => true );
        }
        
    }
   
   echo json_encode($resultados);


?>


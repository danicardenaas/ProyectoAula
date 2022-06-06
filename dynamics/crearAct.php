<?php

    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    $conexion = connect(); 
    $id_usuario=$_SESSION["ID_usuario"];
    
    $tema= (isset($_POST['tema']) && $_POST["tema"] != "")? $_POST['tema'] : false;
    $puntaje= (isset($_POST['puntaje']) && $_POST["puntaje"] != "")? $_POST['puntaje'] : false;
    $hora= (isset($_POST['hora']) && $_POST["hora"] != "")? $_POST['hora'] : false;
    $fecha= (isset($_POST['fecha']) && $_POST["fecha"] != "")? $_POST['fecha'] : false;
    $rubrica= (isset($_POST['rubrica']) && $_POST["rubrica"] != "")? $_POST['rubrica'] : false;
    $indicaciones= (isset($_POST['indicaciones']) && $_POST["indicaciones"] != "")? $_POST['indicaciones'] : false;
    $formatoEntrega= (isset($_POST['formatoEntrega']) && $_POST["formatoEntrega"] != "")? $_POST['formatoEntrega'] : false;
    $titulo= (isset($_POST['titulo']) && $_POST["titulo"] != "")? $_POST['titulo'] : false;
    $titulo= (isset($_POST['titulo']) && $_POST["titulo"] != "")? $_POST['titulo'] : false;


    if($tema && $puntaje && $hora && $fecha && $rubrica && $indicaciones && $formatoEntrega && $titulo)
    {
        //obtener la ruta a los archivos
        $peticion = "INSERT INTO actividad (tema, nombre, indicaciones, ruta_archivos, texto_tareaa, fecha_pub, id_materia, id_entrega, ruta_rubrica,id_juego)
        VALUES ($tema, $titulo, $indicaciones, ) ";
        $query = mysqli_query( $conexion, $peticion ); 
        $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
       
    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    
    
   echo json_encode($respuesta);

    
?>
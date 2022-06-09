<?php
    include("./config.php"); 
    include("./funcionFecha.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $fecha=fecha();
    $id_juego = (isset($_POST['id_juego']) && $_POST["id_juego"] != "")? $_POST['id_juego'] : false;
    $id_usuario=$_SESSION["ID_usuario"];
    $puntaje = (isset($_POST['puntaje']) && $_POST["puntaje"] != "")? $_POST['puntaje'] : false;
    $peticion = "INSERT INTO act_entrega(ID_actividad, calif, fecha_entr, ID_usuario) 
    VALUES ($id_juego, $puntaje, '$fecha',$id_usuario)";
    $query=mysqli_query($conexion, $peticion);
    echo json_encode($query);
?>
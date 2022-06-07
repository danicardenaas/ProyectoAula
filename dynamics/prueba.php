<?php
    
    include("./config.php"); 
    include("./funcionFecha.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    $conexion= connect();
    session_start();
    $id_actividad = (isset($_POST['id_actividad']) && $_POST["id_actividad"] != "")? $_POST['id_actividad'] : false;
    $id_usuario= $_SESSION["ID_usuario"];
    $canArch= (isset($_POST['canArch']) && $_POST["canArch"] != "")? $_POST['canArch'] : false;
    $arch1= (isset($_POST['arch1']) && $_POST["arch1"] != "")? $_POST['arch1'] : false;
    $comment= (isset($_POST['comment']) && $_POST["comment"] != "")? $_POST['comment'] : false;
    $fecha=fecha();
    var_dump($fecha);
?>
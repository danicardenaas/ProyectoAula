<?php
     session_name("SesionUsuario");
     session_id("123456789");
    session_start();
    if(isset($_SESSION["nombre"])){
        session_unset();
        session_destroy();
    }
    $nuevaURL='../templates/PagInicio.php';
    header('Location: '.$nuevaURL);
?>
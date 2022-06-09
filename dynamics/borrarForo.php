<?php
    
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_resp = (isset($_POST['id_resp']) && $_POST["id_resp"] != "")? $_POST['id_resp'] : false;
    $id_preg = (isset($_POST['id_preg']) && $_POST["id_preg"] != "")? $_POST['id_preg'] : false;
    $borrar = (isset($_POST['borrar']) && $_POST["borrar"] != "")? $_POST['borrar'] : false;

    if($borrar==1)
    {
        // Borrar la pregunta
        $peticion = "DELETE FROM dudaresp WHERE id_duda = $id_preg";
        $query = mysqli_query( $conexion, $peticion);
        $peticion = "DELETE FROM duda WHERE id_duda = $id_preg";
        $query = mysqli_query( $conexion, $peticion);

    }
    else{
        $peticion = "DELETE FROM dudaresp WHERE id_dudaresp = $id_resp";
        $query = mysqli_query( $conexion, $peticion); 
    }
    $query = mysqli_query( $conexion, $peticion); 
    echo json_encode($query);
?>
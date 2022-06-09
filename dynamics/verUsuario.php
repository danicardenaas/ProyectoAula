<?php
    include("./config.php"); 
    $conexion = connect(); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $id_verUsuario = (isset($_POST['id_verUsuario']) && $_POST["id_verUsuario"] != "")? $_POST['id_verUsuario'] : false;
     $peticion = "SELECT * FROM usuario WHERE id_usuario = $id_verUsuario";
    $query=mysqli_query($conexion, $peticion);
    $datos=mysqli_fetch_assoc($query);
    // var_dump($datos);
    $_SESSION['nombre2'] =$datos["usuario"];
    $_SESSION['apellido2'] =$datos["apellidos"];
    $_SESSION['nombre_real2']= $datos['nombre'];
    $_SESSION['rol2'] = $datos['ID_tipousuario'];
   
    echo json_encode( $_SESSION);
?>
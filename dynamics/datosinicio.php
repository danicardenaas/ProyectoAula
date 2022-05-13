<?php
    //echo "Usuario: $usuario<br/>Contraseña: $contraseña"

    include("./config.php"); 

    $conexion = connect(); 

    var_dump($conexion); 

    $usuario = (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : "no especifico";
    $contraseña= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : "no especifico";

    $peticion = "INSERT INTO usuario VALUES ('$usuario', '$contraseña')"; 
    //$var_dump($peticion); 

    $query = mysqli_query($conexion, $peticion); 
    var_dump($query); 
?>
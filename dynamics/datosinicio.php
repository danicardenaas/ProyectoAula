<?php
    $usuario = (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : "no especifico";
    $contraseña= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : "no especifico";
    echo "Usuario: $usuario<br/>Contraseña: $contraseña"
?>
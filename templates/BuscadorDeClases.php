<?php
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Busca tu clase</title>
    <link rel="stylesheet" href="../estilo/statics/styles/buscador.css">
</head>
<body>
    <h1>Busca una clase </h1>
    <input type="text" id="input-buscador">
    <div id="resultados">

    </div>
    <div id="registro" style="display: none;">
    <h3>No estas registrado :(</h3>
    
    <input type="text" palceholder="contraseña" id= "contrasena"  style="display: none;">
    <button id= 'btn-registrar' >Registrate</button> 
    </div>
    <form action="./Tablero_tareas.php" method="post">
        <button>Regresar a tablón</button>
    </form>
    <script src="../dynamics/js/buscador.js"></script>
</body>
</html>
<?php
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    if(isset( $_SESSION["nombre"]) && $_SESSION["nombre"]==true)
    {
        $nuevaURL='./inicioConSesion.php';
        header('Location: '.$nuevaURL);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/PagInicio.css">
    <title>Aula virtual Prepa 6</title>
</head>
<body id="body">
    <header>
        <div>
             <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado" id="encabezado"> 
        </div>
     </header>
     <div id="nombre-usuario" style="display:flex">

     </div>
    <nav id="navIzquierdo">
        <a id="calendario" class="botonAzul" href="./inicio.php">Calendario</a> <br/>
        <div id="cuadroCalen" style="display:none">; 
            <a><img src="../Imgs/calendario.jpg" alt="calendario" id="imgCalen"/></a><br/>
        </div>
        <a  href="./inicio.php" id="anuncio" class="botonAzul">Anuncios</a><br/>
        <a href="./inicio.php" id="foro" class="botonAzul">Foro de dudas</a><br/>
        <a href="./inicio.php"id="juegos" class="botonAzul">Juegos educativos</a><br/>
    </nav>

    <main id="main">
        <div id="cuadroAzul">
            <h1 id="bienvenida">¡Bienvenido a ENP 6! </h1>
            <div id="cuadroBlanco">
                <img src="../Imgs/ImagenPrepa.jpg" alt="Prepa6" id="ImagenPrepa"/><br/>
            </div>
            
            <p id="fotos">Fotografías</p><br/> 
        </div>
    </main>
    <nav id="navDerecho">
         <a href="./inicio.php"><p class="botonAzul" id="ingresa">Ingresa</p> </a> <br/>
        <a href="./FormRegistro.html" class="botonAzul" id="registro">Registro</a><br/>
        <!-- <button class="botonAzul" id="prueba" style="margin-top: 300%">Boton Prueba</button>     Este btn es solo para verificar eventos -->
    </nav>
    <footer id="piedep">
        <p>Ubicación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>Contactos:<br>
         Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
    </footer>
    <script src="../dynamics/js/principal.js"></script>

</body>
</html>
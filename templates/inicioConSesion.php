
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

    <nav id="navIzquierdo">
        <a id="calendario" class="botonAzul" >Calendario</a> <br/>
        <div id="x">

        </div>
        <a href="./Tablero_tareas.php" id="anuncio" class="botonAzul">Clases</a><br/> 
        <!-- <a id="anuncio" class="botonAzul">Anuncios</a><br/> -->
        <a href="./foro.html" id="foro" class="botonAzul">Foro de dudas</a><br/>
        <a href="./juegos_edu.html" id="juegos" class="botonAzul">Tablon de alumnos</a><br/>
    </nav>

    <main id="main">
        <div id="cuadroAzul">
            <?php
                session_name("SesionUsuario");
                session_id("123456789");
                session_start();
                if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
                {
                    $nuevaURL='./inicio.php';
                    header('Location: '.$nuevaURL);
                }
                $texto=$_SESSION['nombre'] ;
                $rol=$_SESSION['rol'] ;
                echo "<h1 id='bienvenida'>¡Bienvenido <strong>$texto </strong> a ENP 6! </h1>";
               
          
           
           echo" <div id='cuadroBlanco'>
                <img src='../Imgs/ImagenPrepa.jpg' alt='Prepa6' id='ImagenPrepa'/><br/>
            </div>
            
            <p id='fotos'>Fotografías</p><br/> 
        </div>
        
    </main>
    <nav id='navDerecho'>

        <a href='../dynamics/cerrar.php' class='botonAzul' id='registro'>cerrar</a><br/>";
        if($rol==3)
        {
           echo" <a href='../dynamics/crearUser.php' class='botonAzul' id='crearUsuario' >Crear usuario</a><br/>";
        }
   
      
   echo" </nav>";
     ?>
    <footer id="piedep">
        <p>Ubicaación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>Contactos:<br>
         Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
    </footer>
    <script src="../dynamics/js/principal.js"></script>

</body>
</html>
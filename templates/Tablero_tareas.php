<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases</title>
    <link rel="stylesheet" href="../Estilo/tablero.css">
</head>
<body>
   
    <header>
        <div>
             <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado" id="encabezado"> 
        </div>
     </header>
    <div id="colDerecho"></div>
    <div id="colIzquierdo"></div>
    <main id="main">
        <h1 id='titulo'>Clases:</h1>
        <form action="./BuscadorDeClases.php" method="POST">
            <button id="btn-verClases"> Ver más clases</button>
        </form>
        <form action="./CrearClase.php" method="POST">
             <button id="btn-CrearClase"> Crear clase</button>
        </form>
        <form action="./inicioConSesion.php" method="post">
        <button>Regresar a inicio</button>
        </form>
        
        <div id='contenedor' style='display: flex'>
        </div>
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
    
    </main>
    <footer id="piedep">
        <p>Ubicaación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>Contactos:<br>
         Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
    </footer>
    <script src="../dynamics/js/tablero.js"></script>
</body>
</html>
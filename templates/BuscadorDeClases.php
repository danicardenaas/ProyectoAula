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
    <link rel="stylesheet" href="../Estilo/statics/styles/estilo.css">
</head>
<body>
    </form>
    <header>
        <div >
             <img src="../Imgs/encabezado.png" width="100%" height="12%" alt=""> 
        </div>
     </header>
     <div class="fondo">
         <aside>
             <div class="rec">
             </div>
         </aside>
             <div class="rec2">
             </div> 
        <div id="contenedor-encabezado">
            <div id="encabezado">
                <p>Buscador de clases</p>
            </div>
        </div>
        <div>
                <form action="../templates/PagInicio.php">
                    <button class="salir">Volver al Inicio</button>
                </form>
            </div>
        <div id="contenedor">
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

        </div>
     </div>
     <footer id="piedep">
     <p>Ubicación: Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>
            Créditos: Equipo 7: Julieta Flores, Daniela Cárdenas, Santiago Gónzalez</p>
    </footer>
    <script src="../dynamics/js/buscador.js"></script>
</body>
</html>
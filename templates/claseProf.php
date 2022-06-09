<?php
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    
    if( isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false )
    {
        $texto=$_SESSION['mensaje'];
        echo "<p style='align-center'> $texto</p>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clase</title>
    <link rel="stylesheet" href="../libs/bootstrap-5.2.0-beta1-dist/css/bootstrap.css">
    <link rel="shortcut icon" href="../imgs/ENP6.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../Estilo/statics/styles/estilo.css">
    <link rel="stylesheet" href="../Estilo/statics/styles/clase.css">
</head>
<body>
  <header>
    <div>
      <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado"> 
    </div>
  </header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light" id="BarraDeNavegacion">
    <div class="container-fluid">
      <a class="navbar-brand" href="#" id="nombreClase">Clase</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#" id="asignacionVer">Asignaciones</a>
          </li>
          
          <li id="asignacion" class="nav-item">
            <a class="nav-link" >Crear una asignación</a>
          </li>

          <li id="asignacion" class="nav-item">
            <a href="./crear_juego.html" class="nav-link" >Crear un juego</a>
          </li>
        
        
        </ul>
      </div>
    </div>
  </nav>
  <div class="fondo">
    <div id="contenedor-encabezado">
        <div id="encabezado">
            <p>Clase</p>
        </div>
    </div>
    <aside>
      <div class="rec">
      </div>
    </aside>
      <div class="rec2">
      </div> 

    <div id="contenido">
      <div id="asignaciones">
        <p>Bienvenido a tu clase :))</p>
      </div>
      <div id="entregas">
      </div>
      
      <div id="divCal"  style="display: none;">
        <form id="calificarForm" method="post">
          Calificación: 
          <input id="calif" type="number"  name="calif"/><br>
          <textarea  id="coment" name="coment"></textarea>   
        </form>
        <button id="enviar">Enviar</button>
      </div>
    </div>
    <div id="botones">
      <form action="./Tablero_tareas.php" method="post">
          <button id="regresar" class="salir">Regresar a tablón</button>
      </form>
      <button id="btn-borrar">Borrar clase</button>
  </div>
    </div>
  
    <footer id="piedep-1">
      <p>Ubicación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>
        Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
    </footer>
   <script src="../dynamics/js/claseProf.js"></script>
</body>
</html>
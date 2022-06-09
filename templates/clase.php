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
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="BarraDeNavegacion">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" id="nombreClase">Clase</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#" id="asignacion">Asignaciones</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="#" id="materiales">Calificaciones</a>
        </li> 
        <!-- <li class="nav-item">
          <a class="nav-link" href="#" id="asignaciones">Asignaciones</a>
        </li> 
        -->
      </ul>
  <header>
    <div>
      <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado" > 
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
            <a class="nav-link active" aria-current="page" href="#" id="asignacion">Asignaciones</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#" id="materiales">Materiales</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="asignaciones">Asignaciones</a>
          </li> -->
        
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
        <br><br>  
        <form id='formEntrega' style="display:none" method="post" enctype="multipart/form-data">
        <h3> Haz tu entrega</h3>
        <label id="archivos">
            <input type='file' name='arch1'><br>
        </label>
        <br>
          <button  id="addArch">Agregar archivo</button><br>
        Comentario adicional:<input type='text' name="coment" placeholder='comentario'>
        <button id="enviarTarea">Enviar</button>
        </form>
        <div style="display:none" id="actEntregada">
          Ya hiciste esta entrega
          <br><button class='Eliminar'>Eliminar entrega</button>
          <p id="comentario"></p>
          <div id="adjuntos"></div>
        </div>

        <br><br>  
    </div>
    <form action="./Tablero_tareas.php" method="post">
              <button class="salir" id="regresar" >Regresar a tablón</button>
        </form>
      <div>
        <form action="../templates/PagInicio.php">
            <button class="salir" id="inicio">Volver al Inicio</button>
        </form>
      </div>
    <footer id="piedep">
      <p>Ubicación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>
        Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
    </footer>
   <script src="../dynamics/js/clase.js"></script>
</body>
</html>
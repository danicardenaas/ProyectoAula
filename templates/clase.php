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
<div id="asignaciones">
    <h1>Bienvenido a tu clase :))</h1>
</div>
    <br><br>  
    <form id='formEntrega' style="display:none">
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
  <form action="./Tablero_tareas.php" method="post">
        <button>Regresar a tablón</button>
    </form>
   <script src="../dynamics/js/clase.js"></script>
</body>
</html>
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
          <a class="nav-link active" aria-current="page" href="#" id="asignacionVer">Asignaciones</a>
        </li>
        
        <li id="asignacion" class="nav-item">
          <a class="nav-link" >Crear una asignación</a>
        </li>
      
       
      </ul>
    </div>
  </div>
</nav>
<div id="asignaciones">
    <h1>Bienvenido a tu clase :))</h1>
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
      

    <div id="botones" >
      <form action="./Tablero_tareas.php" method="post">
          <button>Regresar a tablón</button>
      </form>
      <button id="btn-borrar">Borrar clase</button>
    </div>
    
 
    
   <script src="../dynamics/js/claseProf.js"></script>
</body>
</html>
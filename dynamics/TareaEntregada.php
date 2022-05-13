<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Crear Tarea</title>
    <link rel='stylesheet' href='../Estilo/TareaEntregada.css'>
</head>
<body>
<?php
    include './config.php';
    $conexion = connect();
    $peticion = 'SELECT * FROM actividad';
    $query = mysqli_query($conexion, $peticion);
    $datos= mysqli_fetch_array($query, MYSQLI_ASSOC);
    echo "<header>
        <div>
             <img src='../Imgs/encabezado.png' width='100%' height='12%' alt='encabezado' id='encabezado'> 
        </div>
     </header>
     <div id='colDerecho'></div>
     <div id='colIzquierdo'></div>
     <main id='main'>
        <h2 id='titulo'>Titulo de la actividad</h2>
        <h4 id='nombre'>Nombre del alumno: </h4>
        <h4 id='puntaje'>Puntaje máximo: 100 puntos </h4>
        <h4 id='tema'>$datos[tema]</h4>
        <h4 id='fechaEntrega'>Entrega:$datos[fecha_entr] </h4>
        <h4 id='hora'>Hora de entrega: </h4>
        <h4 id='enviado'>Envío:$datos[fecha_pub]</h4>
        <div id='indicaciones' >
            <h4>Indicaciones</h4>
            <p>$datos[indicaciones]</p>
         </div>
        <h4 id='rubrica'>Rúbrica</h4>
        <table border='2' id='tabla'>
            <thead>
                <tr>
                    <th>Criterio</th>
                    <th>2 puntos</th>
                    <th>1 punto</th>
                    <th>0 puntos</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Presentación</td>
                    <td>Perfecta</td>
                    <td>Fallas</td>
                    <td>Deficiente</td>
                </tr>
            </tbody>

        </table>
        <h5 class='dorado' id='arch'>Archivos subidos:</h5>        
        <div id='submit'>$datos[archivos]</div>
        <h5 class='dorado' id='retro'>Retroalimentación:</h5>     
        <div id='retoalimentacion'></div>
        <h4 id='formato'>Formato de entrega:</h4>
        <h4 id='calif'>Calificación:$datos[calif]</h4>
        <button type='submit' id='boton'>Aceptar</button> 

    </main>
    <footer id='piedep'>
        <p>Aula virtual prepa6</p>
    </footer>";
?>
</body>
</html>
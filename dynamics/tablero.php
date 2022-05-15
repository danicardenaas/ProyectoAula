<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Clases</title>
        <link rel='stylesheet' href='../Estilo/tablero.css'>
    </head>
    <body>
    <?php
        include './config.php';
        $conexion = connect();
        $peticion = 'SELECT * FROM materia';
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
            
        <h1 id='titulo'>Clases:</h1>
        <div class='materia' id='mate'>
            <div >
                <h4>$datos[nombre]</h4>
                <img src='../Imgs/Mate.jpg' alt='Imagen de la materia' width='200' height='180' />
            </div> 
            <div class='tareas'>
            Tareas pendientes:
                <ul>
                    <a><li>$datos[ID_actividad]</li></a>
                    <a><li>Tarea 2</li></a>
                    <a><li>Tarea 3</li> </a>
                </ul>
            </div>
        </div>
        <div class='materia' id='historia'>
                <div >
                <h4>Historia</h4>
                <img src='../Imgs/historia.jpg' alt='Imagen de la materia' width='200' height='180' />
                </div>
                <div class='tareas' >
                Tareas pendientes:
                <ul>
                    <a><li>Tarea a</li></a>
                    <a><li>Tarea b</li></a>
                    <a><li>Tarea c</li> </a>
                </ul>
                </div>
        </div>
        </main>
        <hr/>
        <footer id='piedep'>
            <p>Aula virtual prepa6</p>
        </footer>";
    ?>

    </body>
</html>
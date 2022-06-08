<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Estilo/inicio.css">
        <title>Inicio</title>
    </head>
    <body>
    
        <header>
            <div>
                 <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado"> 
            </div>
        </header>
        <div id="boton">
            <form action="./PagInicio.php">
                            <button  class="boton" id="enviar">Volver al inicio</button>
            </form>
        </div>
        <main class="contenedor">
            <div id="cuadroAmarillo"> </div>
            <form action="..\dynamics\datosinicio.php" method="post">
                <fieldset id="cuadroAzul">
                    <h2 id="titulo">Inicio de sesión</h2>
                    <label for="usuario" class="etiqueta" id="usuario">Usuario: </label>
                    <input type="text" name="usuario" placeholder="Correo electrónico no. de cuenta" required><br/><br/>
                    <label for="contraseña" class="etiqueta" id="pass">Contraseña: </label>
                    <input type="password" name="contraseña" placeholder="  Contraseña" required><br/><br/>
                    <!--<a class="etiqueta">¿Olvisdaste tu contraseña?</a><br><br>-->
                    <p class="etiqueta">¿Eres nuevo?<a href=".\FormRegistro.html" class="etiqueta"> Registráte aquí</a></p><br>
                    <button type="submit"class="boton">Siguiente</button> 
                    
                </fieldset>
            </form>
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
          
        </main>
        <footer class="piedep">
            Aula virtual - Escuela Nacional Preparatoria Plantel 6 "Antonio Caso"
        </footer>
    </body>
    <scritpt src="./dynamics/inicio.js"></scritpt>
    
</html> 
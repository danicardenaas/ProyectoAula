<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="../Estilo/statics/styles/estilo.css">
    <link rel="stylesheet" href="../Estilo/perfil.css">
</head>
<body>
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
                <h1>Perfil</h1>
            </div>
        </div>
            

         <div>
             <form action="../templates/PagInicio.php">
                 <button class="salir">Volver al Inicio</button>
             </form>
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
            if(!isset($_SESSION["apellido"]) && $_SESSION["apellido"]==false)
            {
                echo "algo salió mal";
            }
            echo "
                <main id='contenedor'>
                    <div id='cuadro-blanco'>
                        <div id='texto'>
                            <div>Nombre: "; echo ($_SESSION['nombre_real']); echo "</div><br/>
                            <div>Apellidos: "; echo ($_SESSION['apellido']); echo "</div><br/>
                            <div>Nombre de usuario: "; echo ($_SESSION['nombre']); echo "</div><br/>
                            <div>Rol: "; 
                            if(($_SESSION['rol']) == 1 ){
                                echo "estudiante";
                            } 
                            if(($_SESSION['rol']) == 2 ){
                                echo "profesor(a)";
                            } 
                            echo "</div><br/>
                        </div>
                    </div>
                </main>";
        ?>
     </div>
     <footer id="piedep">
        <p>Ubicaación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>Contactos:<br>
         Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
    </footer>
</body>
</html>
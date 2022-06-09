<?php
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    $id_usuario=$_SESSION["ID_usuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crea una clase</title>
    <link rel="stylesheet" href="../Estilo/statics/styles/estilo.css">
    <link rel="stylesheet" href="../Estilo/statics/styles/crear_clase.css">
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
                <p>Creador de clases</p>
            </div>
        </div>
        <div>
                <form action="../templates/PagInicio.php">
                    <button class="salir">Volver al Inicio</button>
                </form>
            </div>
        <div id="contenedor">
            <form action="./crearClase.php" id="formularioCrear" method="post" enctype="multipart/form-data" >
                <label for="nombre">Nombre 
                    <input name="nombre" id="nombre" type="text">
                </label><br>
                <h3>Clasificación</h3>

                <label for="LenguaEspanola">Lengua Española
                    <input type="radio" name="materia" id="LenguaEspanola" value=1 checked>
                </label><br>
                
                <label for="LiteraturaUn">Literatura Universal
                    <input type="radio" name="materia" id="LiteraturaUn" value=2 >
                </label><br>
                <label for="Mate">Matematicas
                    <input type="radio" name="materia" id="Mate" value=3 >
                </label><br>
                <label for="Biologia">Biología
                    <input type="radio" name="materia" id="Biologia" value=4>
                </label><br>
                <label for="HistoriaUni">Historia Universal
                    <input type="radio" name="materia" id="HistoriaUni" value=5>
                </label><br>
                <label for="imagen">Imagen: 
                    <input name="imagen" id="imagen" type="file">
                </label><br>
                    <h4>Esta clase es:</h4>
                <label for="publica">Publica 
                    <input type="radio" name="publica" id="publica" value=1 checked>
                </label>
                <label for="privada">Privada
                    <input type="radio" name="publica" id="privada" value=0 >
                </label>
                <label for="contrasena" style="display:none;" id="contrasena">Contraseña
                    <input id="contrasena" type="text" id="contrasena" name="contrasena">
                </label>
                    <br>
                <label for="grupo" id="grupo">Grupo al que se le asiganara:
                        <select name="grupo" id="grupo">
                            <option value="">No específico</option>
                            <option value="401">	401	</option>
                            <option value="402">	402	</option>
                            <option value="403">	403	</option>
                            <option value="404">	404	</option>
                            <option value="405">	405	</option>
                            <option value="406">	406	</option>
                            <option value="407">	407	</option>
                            <option value="408">	408	</option>
                            <option value="409">	409	</option>
                            <option value="410">	410	</option>
                            <option value="411">	411	</option>
                            <option value="412">	412	</option>
                            <option value="413">	413	</option>
                            <option value="414">	414	</option>
                            <option value="415">	415	</option>
                            <option value="416">	416	</option>
                            <option value="417">	417	</option>
                            <option value="451">	451	</option>
                            <option value="452">	452	</option>
                            <option value="453">	453	</option>
                            <option value="454">	454	</option>
                            <option value="455">	455	</option>
                            <option value="456">	456	</option>
                            <option value="457">	457	</option>
                            <option value="458">	458	</option>
                            <option value="459">	459	</option>
                            <option value="460">	460	</option>
                            <option value="461">	461	</option>
                            <option value="462">	462	</option>
                            <option value="463">	463	</option>
                            <option value="464">	464	</option>
                            <option value="465">	465	</option>
                            <option value="466">	466	</option>
                            <option value="501">	501	</option>
                            <option value="502">	502	</option>
                            <option value="503">	503	</option>
                            <option value="504">	504	</option>
                            <option value="505">	505	</option>
                            <option value="506">	506	</option>
                            <option value="507">	507	</option>
                            <option value="508">	508	</option>
                            <option value="509">	509	</option>
                            <option value="510">	510	</option>
                            <option value="511">	511	</option>
                            <option value="512">	512	</option>
                            <option value="513">	513	</option>
                            <option value="514">	514	</option>
                            <option value="515">	515	</option>
                            <option value="516">	516	</option>
                            <option value="517">	517	</option>
                            <option value="518">	518	</option>
                            <option value="551">	551	</option>
                            <option value="552">	552	</option>
                            <option value="553">	553	</option>
                            <option value="554">	554	</option>
                            <option value="555">	555	</option>
                            <option value="556">	556	</option>
                            <option value="557">	557	</option>
                            <option value="558">	558	</option>
                            <option value="559">	559	</option>
                            <option value="560">	560	</option>
                            <option value="561">	561	</option>
                            <option value="562">	562	</option>
                            <option value="563">	563	</option>
                            <option value="564">	564	</option>
                            <option value="601">	601	</option>
                            <option value="602">	602	</option>
                            <option value="603">	603	</option>
                            <option value="604">	604	</option>
                            <option value="605">	605	</option>
                            <option value="606">	606	</option>
                            <option value="607">	607	</option>
                            <option value="608">	608	</option>
                            <option value="609">	609	</option>
                            <option value="610">	610	</option>
                            <option value="611">	611	</option>
                            <option value="612">	612	</option>
                            <option value="613">	613	</option>
                            <option value="614">	614	</option>
                            <option value="615">	615	</option>
                            <option value="616">	616	</option>
                            <option value="617">	617	</option>
                            <option value="618">	618	</option>
                            <option value="619">	619	</option>
                            <option value="651">	651	</option>
                            <option value="652">	652	</option>
                            <option value="653">	653	</option>
                            <option value="654">	654	</option>
                            <option value="655">	655	</option>
                            <option value="656">	656	</option>
                            <option value="657">	657	</option>
                            <option value="658">	658	</option>
                            <option value="659">	659	</option>
                            <option value="660">	660	</option>
                            <option value="661">	661	</option>
                            <option value="662">	662	</option>
                            <option value="663">	663	</option>
                            <option value="664">	664	</option>
                        </select>
                    </label> <br>
                    <label for="seccion" id="seccion">Sección a que se asignará:
                        <select name="seccion" id="seccion">
                            <option value="">No específico</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                        </select>
                    </label> <br>
                <button id="btn-enviar"> Crear clase</button>
            </form>
        </div>
     </div>
     <footer id="piedep">
     <p>Ubicación: Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>
            Créditos: Equipo 7: Julieta Flores, Daniela Cárdenas, Santiago Gónzalez</p>
    </footer>
    </form>
    <script src="../dynamics/js/crearClase.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Estilo/registro.css">
        <title>Registro</title>
    </head>
    <body>
        <header>
            <div>
                 <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado"> 
            </div>
         </header>
        <main id="contenedor">
        
            <div id="cuadroAmarillo"> </div>        
            <form action="..\dynamics\datosregistro.php" method="post" enctype="multipart/form-data" id="form-registro">
        
                <fieldset id="cuadroAzul">
                    <h2 id="TituloForm">Creación de usuario:</h2>
                    <label for="nombre">
                        <input type="text" name="nombre" placeholder="Nombre(s)" required class="escribir"> 
                    </label>
                    <label for="apellido">
                        <input type="text" name="apellido" placeholder="Apellidos" required class="escribir"><br/><br/>
                    </label>
                    <label for="cumpleaños" class="Etiquetas">Fecha de nacimiento: </label>
                        <input type="date" name="cumpleaños" required class="escribir"><br/><br/>
                    <label for="telefono">
                        <input type="number" name="telefono" placeholder="No. de teléfono" required class="escribir"> <br/><br>
                    </label>
                    <label for="rol" class="Etiquetas">Rol: </label>
                    <select  name="rol" id="rol">
                        <option disabled>Estudiante/profesor</option>
                        <option value=1>Estudiante</option>
                        <option value=2>Profesor</option>
                        <option value=3>Administrador</option>
                        <option value=4>Moderador</option>
                    </select><br/><br/><br/>
                    <label for="cuenta" id ="cuenta" style="display: none;" >
                        <input type="text" name="cuenta" placeholder="No.de cuenta" required class="escribir">
                    </label>
                    <label for="rfc" >
                        <br><input type="text"  name="rfc"  id ="rfc" style="display:none ;" placeholder="RFC" required class="escribir">
                    </label>
                     <label for="correo">
                        <input type="email" name="correo" placeholder="Correo electónico" required class="escribir"><br/><br/>
                    </label>
              
                    <label for="grupo" class="Etiquetas" style="display:none" id="grupo">Grado que cursas: 
                        <select name="grupo" id="grupo">
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
                    </label>  
                    
                    <label for="seccion" class="Etiquetas" style="display: none" id="seccionlabel">Sección: </label>
                    <select name="seccion"  style="display:none" id="seccion">
                        <option value="A">A</option>
                        <option value="B">B</option>
                    </select><br><br/>
                    <label for="usuario">
                        <input type="text" name="usuario" placeholder="Nombre de usuario" required class="escribir"/>
                    </label>
                    <label for="contraseña"></label>
                        <input type="password" name="contraseña" placeholder="Contraseña" required class="escribir"/><br/><br>
                    </label>
                    <label for="foto" class="Etiquetas">Foto: </label>
                    <input type="file" name="foto" class="escribir"><br/><br>
                    
                    <button type="submit" class="boton" id="registrarme">Registrar </button> 
                    <button type="reset" class="boton" id="borrar">Borrar todo </button> 
                
                </fieldset>
            </form>
            <form action="../templates/InicioConSesion.php">
                <button class="boton" id="volver">Volver al inicio</button>
            </form> 
     
        </main>

        <footer class="piedep">
                Aula virtual - Escuela Nacional Preparatoria Plantel 6 "Antonio Caso"
        </footer>
        <script src="../dynamics/js/registro.js"></script>
    </body>
</html>
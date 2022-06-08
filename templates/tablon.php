<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilo/statics/styles/estilo.css">
    <link rel="stylesheet" href="../Estilo/foro.css">
    <title>Foro</title>
</head>
<body>
    <header>
       <div class="img-encabezado">
            <img src="../Imgs/encabezado.png" width="100%" height="12%" alt="encabezado"> 
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
               <p>Materiales de consulta</p>
           </div>
         
       </div>
       <div>
         
       </div>
        <div>
           
        </div>
        <div class="Cuadro-blanco" id="tablon" >
          
        </div>
    </div>
    <form id="form">Filtrado
               <select name="filtrado" id="filtrado">
                    <option value="0">Ninguno</option>
                    <option value="1">Por materia</option>
                    <option value="2">Por usuario</option>
                    <option value="3">Más populares</option>
                    <option value="4">Tipo de material</option>
               </select>
               <select name="materia" style="display:none" id="materia">

                    <option value="1400">Matemáticas IV</option>
                    <option value="1401">Física III</option>
                    <option value="1402">Lengua Española</option>
                    <option value="1403">Historia Universal</option>
                    <option value="1404">Lógica</option>
                    <option value="1405">Geografía</option>
                    <option value="1406">Dibujo II</option>
                    <option value="1407">Lengua Extranjera Inglés IV</option>
                    <option value="1408">Lengua Extranjera Francés IV</option>
                    <option value="1409">Estética</option>
                    <option value="1410">Educación Física IV</option>
                    <option value="1411">Orientación Educativa IV</option>
                    <option value="1412">Informática</option>

                    <option value="1500">Matemáticas V</option>
                    <option value="1501">Química III</option>
                    <option value="1502">Biología IV</option>
                    <option value="1503">Educación para la Salud</option>
                    <option value="1504">Historia de México II</option>
                    <option value="1505">Etimologías Grecolatinas</option>
                    <option value="1506">Lengua Extranjera Inglés V</option>
                    <option value="1507">Lengua Extranjera Francés V</option>
                    <option value="1508">Lengua Extranjera Italiano I</option>
                    <option value="1509">Lengua Extranjera Alemán I</option>
                    <option value="1510">Lengua Extranjera Inglés I</option>
                    <option value="1511">Lengua Extranjera Francés I</option>
                    <option value="1512">Ética</option>
                    <option value="1513">Educación Física V</option>
                    <option value="1514">Estética</option>
                    <option value="1515">Orientación Educativa V</option>
                    <option value="1516">Literatura Universal</option>

                    <option value="1601">Derecho</option>
                    <option value="1602">Literatura Mex. e Iberoam.</option>
                    <option value="1603">Inglés VI</option>
                    <option value="1604">Francés VI</option>
                    <option value="1605">Alemán II</option>
                    <option value="1606">Italiano II</option>
                    <option value="1607">Inglés II</option>
                    <option value="1608">Francés II</option>
                    <option value="1609">Psicología</option>
                        <!-- faltan agregar todas las estéticas específicas y las de área-->
                </select>
                <input name="usuarioB" placeholder="Ingresa el usuario" type="text" id="usuarioBuscado" style="display:none">
                <select  name="tipo" id="tipo" style="display:none">
                    <option value="1">Apunte</option>
                    <option value="2">Libro</option>
                    <option value="3">Documento de consulta</option>
                    <option value="3">Ensayo/Reporte</option>
                    <option value="5">Otro</option>
                </select>
            </form>
    <a href="./MaterialEstudio"> Subir un material</a>
    <footer id="piedep">
       <p>Ubicación:Corina 3, Del Carmen, Coyoacán, 04100 Ciudad de México, CDMX<br>Contactos:<br>
        Créditos: Equipo 7: Julieta Flores, Daniela Cardenas, Santiago Gónzalez</p>
   </footer>
    <script src="../dynamics/js/tablon.js"></script>
</body>
</html>
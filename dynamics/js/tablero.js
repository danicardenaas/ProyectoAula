const divContenedor = document.getElementById('contenedor'); 
const materia = document.getElementsByClassName('materia');
const divtarea = document.getElementById('contenedor'); 


const cuadroTarea = document.createElement('div');
cuadroTarea.innerHTML="<h1 id='titulo'>Clases:</h1><div id='contenedor' style='display: flex'> <div class='materia' id='01'><div style='display:flex' id='nombreMat'><h4>Matematicas</h4><img src='../Imgs/materias/Mate.jpg' alt='Imagen de la materia' width='200' height='180' /></div><div class='tareas' id='02' style='display: none'> Tareas pendientes:<ul> <a><li>Tarea 2</li></a><a><li>Tarea 3</li> </a> </ul></div></div>";

// //  hacer petición para obtener
// divContenedor.addEventListener('mouseenter', (evento) =>{
//     divtarea.style.display = 'flex'; 
// }); 

// divContenedor.addEventListener('mouseleave', (evento) =>{
//     divtarea.style.display = 'none'; 
// }); 
const datosForm = new FormData();
fetch("../dynamics/tablero.php", {
    method:"POST", 
    body: datosForm,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    console.log(datosJSON);
    i=1;
    for (let materia of datosJSON)
    {
        const cuadroTarea = document.createElement('div');
        cuadroTarea.innerHTML=" <div class='materia' id='"+i+"'><div id='nom"+materia.nombre+"'><h4>"+materia.nombre+"</h4><img src='"+materia.ruta_imagen+"' alt='Imagen de la materia' width='200vw' height='200vh' /></div><div class='tareas' id='tarea"+i+"'> Tareas pendientes:<ul> <a><li>Tarea 2</li></a><a><li>Tarea 3</li> </a> </ul></div></div>";
       console.log(cuadroTarea);
        i++;
        divtarea.appendChild(cuadroTarea);
    }
  });
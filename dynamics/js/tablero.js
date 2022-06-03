const divContenedor = document.getElementById('contenedor'); 
const materia = document.getElementsByClassName('materia');
const divtarea = document.getElementById('contenedor'); 


const cuadroTarea = document.createElement('div');
var inscrito;
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
   
    i=1;
    for (let materia of datosJSON)
    {
        const cuadroTarea = document.createElement('div');
        cuadroTarea.innerHTML=" <div class='materia' id='"+materia.ID_materia+"'><div id='nom"+materia.nombreMateria+"'><h4>"+materia.nombreMateria+"</h4><img src='"+materia.ruta_imagen+"' alt='Imagen de la materia' width='200vw' height='200vh' /></div><div class='tareas' id='tarea"+i+"'> Tareas pendientes:<ul> <a><li>Tarea 2</li></a><a><li>Tarea 3</li> </a> </ul></div></div>";
       
        i++;
        divtarea.appendChild(cuadroTarea);
    }
  });
divtarea.addEventListener("click", (evento)=>{
 
  if (evento.target.classList.contains("materia")){
      let materia=evento.target.id;
      
      const datosForm2= new FormData();
    
      datosForm2.append("id_materia", materia);
      fetch("../dynamics/clase.php", {
        method:"POST", 
        body: datosForm2,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        if(datosJSON.inscrito)
        {
          //redireccionar a la pestaña
           console.log("si");
        }
        else if(!datosJSON.inscrito)
        {
          const cuadroRegistro = document.createElement("div");
          cuadroRegistro.style.display = block;
          cuadroRegistro.id="Form registro";

        }
});
  }
}
);


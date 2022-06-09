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


fetch("../dynamics/tablero.php", {
    method:"POST", 
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
   
    i=1;
    
    for (let materia of datosJSON)
    {
      const cuadroTarea = document.createElement('div');
      if (materia != "no")
      {
        
        cuadroTarea.innerHTML=" <div class='materia' id='"+materia.ID_materia+"'><div id='nom"+materia.nombreMateria+"'><div id='nombre_materia'>"+materia.nombreMateria+"</div><img src='"+materia.ruta_imagen+"' alt='Imagen de la materia' width='80%' height='80%' /></div> ";
       
        i++;
        divtarea.appendChild(cuadroTarea);
      }
 	else{
        cuadroTarea.innerHTML="No tienes clases";
      }
        
    }
  });
divtarea.addEventListener("click", (evento)=>{
 
  if (evento.target.classList.contains("materia")){
      let materia=evento.target.id;
      
      const datosForm2= new FormData();
    
      datosForm2.append("id_materia", materia);
 	    datosForm2.append("fetch", 1);
      fetch("../dynamics/clase.php", {
        method:"POST", 
        body: datosForm2,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        if(datosJSON.inscrito)
        {
          //redireccionar a la pestaña
          
          if(datosJSON.rol == null)
          {
            window.location= "./clase.php";
          }    
          else{
            console.log(datosJSON.rol);
            //tiene vista de profesor
            window.location= "./claseProf.php";
          }     
          document.cookie = "id_materia ="+ materia;
          //rol, y que vaya a otra vista
         
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


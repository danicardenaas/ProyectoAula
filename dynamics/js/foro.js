const index = document.getElementById("indice");; 
const divForo = document.getElementById("foro");
const divFrecuente = document.getElementById("foroFrecuente"); 
const  enviar= document.getElementById("enviar");
const  resp= document.getElementById("resp");
const  preguntaNueva= document.getElementById("preguntaNueva");
const  enviar_res= document.getElementById("enviar_res");
const btnFrecuente = document.getElementById("frecuente")
const btnNormal = document.getElementById("normal")
const selectDuda = document.getElementById("tipoduda"); 
//Petición para mostrar todas las preguntas en la base
divForo.innerHTML="";
var id_preg;
var duda;
var tipoduda; 
var rol; 
const datosForm2= new FormData();
function despliegue(){
  divForo.innerHTML="";
  divFrecuente.innerHTML="";
  fetch("../dynamics/preguntas.php", {
    method:"POST", 
    body: datosForm2,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    
    // console.log(selectDuda.value); 
    // console.log(datosJSON.preguntas[3].ID_tipoduda); //da el valor del tipo
    if(datosJSON.rol==4){
    
      selectDuda.style.display="block";
    } 
    else{
      selectDuda.style.display="none";
    }
     i=0;
     for (pregunta of datosJSON.preguntas){
      // console.log(pregunta.ID_tipoduda); 
      tipoduda = pregunta.ID_tipoduda; 
    
    
      if(tipoduda == 1) //normal
      {
        duda = pregunta.ID_duda
        divForo.innerHTML += "<div id='"+pregunta.ID_duda+"'>"+pregunta.descripcion+"<br>";
        divForo.innerHTML += pregunta.fecha_pub+"  ";
        divForo.innerHTML += pregunta.usuario+"<button class='resp' id='"+pregunta.ID_duda+"'>Responder</button></div>";
        if(datosJSON.rol==4){
          divForo.innerHTML += "<button id='"+pregunta.ID_duda+"'>Borrar</button><br>";
        } 
        if(datosJSON.usuario==pregunta.ID_usuario){
          
          divForo.innerHTML += "<button class='borrar' id='"+pregunta.ID_duda+"'>Borrar</button><br>";
        } 
        
        if(datosJSON.respuestas[i])
        {
          for(respuesta of datosJSON.respuestas[i])
        {
            if(respuesta.ID_duda == duda )
            { 
              divForo.innerHTML += "<div style='margin-left:5vw ' id='"+respuesta.ID_dudaresp+"'>"+respuesta.descripcion+"<br>"+respuesta.fecha_pub+"  "+respuesta.usuario+"</div>";
            }
            if(datosJSON.rol==4){
              divForo.innerHTML += "<button id='"+respuesta.ID_dudaresp+"'>Borrar</button><br><br>";
            } 
        }
        }
        
      }
     else  if(tipoduda == 2) //normal
      {
       
        duda = pregunta.ID_duda
        divFrecuente.innerHTML += "<div id='"+pregunta.ID_duda+"'>"+pregunta.descripcion+"<br>";
        divFrecuente.innerHTML += pregunta.fecha_pub+"  ";
        divFrecuente.innerHTML += pregunta.usuario+"<button class='resp' id='"+pregunta.ID_duda+"'>Responder</button></div><br><br><br>";
        if(datosJSON.respuestas[i])
        {
          for(respuesta of datosJSON.respuestas[i])
          {  
            if(respuesta.ID_duda == duda )
            {  
               divFrecuente.innerHTML += "<div style='margin-left:5vw ' id='"+respuesta.ID_dudaresp+"'>"+respuesta.descripcion+"<br>"+respuesta.fecha_pub+"  "+respuesta.usuario+"</div>";
            }
            if(datosJSON.rol==4){
              divFrecuente.innerHTML += "<button id='"+respuesta.ID_dudaresp+"'>Borrar</button><br><br>";
            } 
          }
        }
      }
      i++;
     }
  })
}
despliegue();


index.addEventListener("mouseenter", (evento) =>{
    divForo.style.display = "flex"; 
}); 

index.addEventListener("mouseleave", (evento) =>{
    divForo.style.display = "none"; 
}); 
enviar.addEventListener("click", (evento)=>{
    evento.preventDefault();
    const datosForm= new FormData(preguntaNueva);
    fetch("../dynamics/InsertarPregunta.php", {
      method:"POST", 
      body: datosForm,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      if(datosJSON.OK==false)
      {
        alert(datosJSON.texto);
      }
      else{
        despliegue();
      }
       
    })
});
divForo.addEventListener("click", (evento)=>{
  if(evento.target.classList.contains("resp"))
  {
    resp.style.display="block";
    resp.style.background="pink";
  }
  id_preg=evento.target.id;
  
});
divFrecuente.addEventListener("click", (evento)=>{
  if(evento.target.classList.contains("resp"))
  {
    resp.style.display="block";
    resp.style.background="pink";
  }
  id_preg=evento.target.id;
});
enviar_res.addEventListener("click", (evento)=>{
  evento.preventDefault();

    const datosForm2= new FormData(resp);
    datosForm2.append("id_pregunta", id_preg);
    fetch("../dynamics/insertarRes.php", {
      method:"POST", 
      body: datosForm2,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      if(datosJSON.OK==false)
      {
        alert(datosJSON.texto);
      }
      else{
        despliegue();
      }
    })
    resp.style.display="none";
});

btnFrecuente.addEventListener("click", (evento) =>{
  divForo.style.display="none"; 
  divFrecuente.style.display="block"; 

  despliegue(); 
  btnNormal.style.display="block"; 
  btnFrecuente.style.display="none"; 
 
}); 

btnNormal.addEventListener("click", (evento) =>{
 
  despliegue(); 
  divFrecuente.style.display="none"; 
  divForo.style.display="block"; 
  btnNormal.style.display="none"; 
  btnFrecuente.style.display="block"; 
  
}); 
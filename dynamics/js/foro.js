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
const busqueda = document.getElementById("busqueda"); 
const modif = document.getElementById("modif"); 
const modText = document.getElementById("modText"); 
const modArch = document.getElementById("modArch"); 
const enviar_mod = document.getElementById("enviar_mod"); 
//Petición para mostrar todas las preguntas en la base
var modificar;
divForo.innerHTML="";
var id_preg;
var id_resp;
var duda;
var tipoduda; 
var rol; 
var termino="";
const datosForm2= new FormData();
const datosForm3= new FormData();

function borrarPreg(control)
{
  //1 Borrar la pregunta
  //2 borrar solo la respuesta
  if(control == 1)
  {
    datosForm3.append("borrar", 1);
    datosForm3.append("id_preg", id_preg);
    datosForm3.append("id_resp", "");
  }
  else{
    datosForm3.append("borrar", 2);
    datosForm3.append("id_resp", id_resp);
    datosForm3.append("id_preg", "");
  }
  fetch("../dynamics/borrarForo.php", {
    method:"POST", 
    body: datosForm3,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    if(!datosJSON)
    {
      alert("Algo salió mal :(");
    }
  });
  despliegue();
}
function despliegue(){
 
  datosForm2.append("termino", termino);
  fetch("../dynamics/preguntas.php", {
    method:"POST", 
    body: datosForm2,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    
    console.log(datosJSON);
    if(datosJSON.rol==4){
    
      selectDuda.style.display="block";
    } 
    else{
      selectDuda.style.display="none";
    }
     i=0;
     divForo.innerHTML="";
     divFrecuente.innerHTML="";
     if(datosJSON.preguntas != null)
     {
      for (pregunta of datosJSON.preguntas){
    
        tipoduda = pregunta.ID_tipoduda; 
      
      
        if(tipoduda == 1) //normal
        {
          duda = pregunta.ID_duda
          divForo.innerHTML += "<div class ='pregunta' id='"+pregunta.ID_duda+"'><span>"+pregunta.descripcion+"</span><br>";
          divForo.innerHTML += pregunta.fecha_pub+"  ";
          divForo.innerHTML += "<span class='usuario' id='"+pregunta.ID_usuario+"'>"+pregunta.usuario+"</span><button class='resp' id='"+pregunta.ID_duda+"'>Responder</button></div>";
          if(datosJSON.rol==4){
            divForo.innerHTML += "<button class='borrarPreg' id='"+pregunta.ID_duda+"'>Borrar</button>";
            divForo.innerHTML += "<button class='modificarPreg' id='"+pregunta.ID_duda+"'>Modificar</button><br>";
          } 
          if(datosJSON.usuario==pregunta.ID_usuario){
            
            divForo.innerHTML += "<button class='borrarPreg' id='"+pregunta.ID_duda+"'>Borrar</button>";
            divForo.innerHTML += "<button class='modificarPreg' id='"+pregunta.ID_duda+"'>Modificar</button><br>";
          } 
          
          if(datosJSON.respuestas[i])
          {
            for(respuesta of datosJSON.respuestas[i])
          {
              if(respuesta.ID_duda == duda )
              { 
                divForo.innerHTML += "<div style='margin-left:5vw ' class='resp' id='"+respuesta.ID_dudaresp+"'><span>"+respuesta.descripcion+"</span><br>"+respuesta.fecha_pub+"  "+respuesta.usuario+"</div>";
              }
              if(datosJSON.rol==4 || datosJSON.usuario==respuesta.ID_usuario ){
                divForo.innerHTML += "<button class = 'borrarResp' id='"+respuesta.ID_dudaresp+"'>Borrar</button>";
                divForo.innerHTML += "<button class='modificarResp' id='"+respuesta.ID_dudaresp+"'>Modificar</button><br>";
              } 
          }
          }
          
        }
       else  if(tipoduda == 2) //Frecuente
        {
         
          duda = pregunta.ID_duda
          divFrecuente.innerHTML += "<div class='pregunta' id='"+pregunta.ID_duda+"'><span>"+pregunta.descripcion+"</span><br>";
          divFrecuente.innerHTML += pregunta.fecha_pub+"  ";
          divFrecuente.innerHTML += "<span class='usuario' id='"+pregunta.ID_usuario+"'>"+pregunta.usuario+"</span><button class='resp' id='"+pregunta.ID_duda+"'>Responder</button></div>";
          if(datosJSON.rol==4){
            divForo.innerHTML += "<button class='borrarPreg' id='"+pregunta.ID_duda+"'>Borrar</button>";
              divForo.innerHTML += "<button class='modificarPreg' id='"+pregunta.ID_duda+"'>Modificar</button><br>";
          } 
          if(datosJSON.usuario==pregunta.ID_usuario){
            
            divForo.innerHTML += "<button class='borrarPreg' id='"+pregunta.ID_duda+"'>Borrar</button>";
              divForo.innerHTML += "<button class='modificarPreg' id='"+pregunta.ID_duda+"'>Modificar</button><br>";
          } 
          if(datosJSON.respuestas[i])
          {
            for(respuesta of datosJSON.respuestas[i])
            {  
              if(respuesta.ID_duda == duda )
              {  
                 divFrecuente.innerHTML += "<div class = 'resp' style='margin-left:5vw ' id='"+respuesta.ID_dudaresp+"'><span>"+respuesta.descripcion+"</span><br>"+respuesta.fecha_pub+"  "+respuesta.usuario+"</div>";
              }
              if(datosJSON.rol==4 || datosJSON.usuario==respuesta.ID_usuario ){
                divFrecuente.innerHTML += "<button class = 'borrarResp' id='"+respuesta.ID_dudaresp+"'>Borrar</button><br><br>";
                divForo.innerHTML += "<button class='modificarResp' id='"+respuesta.ID_dudaresp+"'>Modificar</button><br>";
                console.log();
              } 
              
            }
          }
        }
        i++;
       }
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
 id_preg=evento.target.id;
  if(evento.target.classList.contains("resp"))
  {
    resp.style.display="block";
    resp.style.background="pink";
  } 
  else if(evento.target.classList.contains("borrarPreg"))
  {
    borrarPreg(1);
  }
  else if(evento.target.classList.contains("borrarResp"))
  {
    id_resp=evento.target.id;
    borrarPreg(2);
  }
  else if(evento.target.classList.contains("modificarResp"))
  {
    modif.style.display="block";
    resp.style.display="none";
    id_resp=evento.target.id;
    modText.value=evento.target.previousElementSibling.previousElementSibling.children[0].innerHTML;
    modificar=2;
    console.log(evento.target);

  }
  else if(evento.target.classList.contains("modificarPreg"))
  {
    resp.style.display="none";
    modif.style.display="block";
    id_preg=evento.target.id;
    console.log(evento.target.parentElement.children[0].innerHTML);
    modText.value=evento.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.children[0].innerHTML;
    modificar=1;
  }
  else if(evento.target.classList.contains("usuario"))
  {
    
    usuarioTarget=evento.target.id;
    console.log(usuarioTarget);
  }
});
divFrecuente.addEventListener("click", (evento)=>{
 id_preg=evento.target.id; 
 if(evento.target.classList.contains("resp"))
  {
    resp.style.display="block";
    resp.style.background="pink";
  }
  else if(evento.target.classList.contains("borrarPreg"))
  {
    borrarPreg(1);
  }
  else if(evento.target.classList.contains("borrarResp"))
  {
    id_resp=evento.target.id;
    borrarPreg(2);
  }
  else if(evento.target.classList.contains("modificarResp"))
  {
    modif.style.display="block";
    resp.style.display="none";
    id_resp=evento.target.id;
    modText.value=evento.target.previousElementSibling.previousElementSibling.children[0].innerHTML;
    modificar=2;
    console.log(id_resp);
  }
  else if(evento.target.classList.contains("modificarPreg"))
  {
    resp.style.display="none";
    modif.style.display="block";
    id_preg=evento.target.id;
   
    console.log(evento.target.parentElement.children[0].innerHTML);
    modText.value=evento.target.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.children[0].innerHTML;
    modificar=1;
  }
  else if(evento.target.classList.contains("usuario"))
  {
    
   usuarioTarget=evento.target.id;
   //para lo del perfil
  }

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
  resp.style.display="none";
  despliegue(); 
  btnNormal.style.display="block"; 
  btnFrecuente.style.display="none"; 

 
}); 

btnNormal.addEventListener("click", (evento) =>{
  resp.style.display="none";
  despliegue(); 
  divFrecuente.style.display="none"; 
  divForo.style.display="block"; 
  btnNormal.style.display="none"; 
  btnFrecuente.style.display="block"; 
  
}); 
busqueda.addEventListener("keyup", ()=>{
  termino=busqueda.value;
    divForo.innerHTML="";
  if(termino.length>2)
  {
  
    despliegue();
  }
  else{
    termino="";
    despliegue();
  }

});
enviar_mod.addEventListener("click", (evento)=>{
  evento.preventDefault();
  modif.style.display="none";
  console.log("hi");
  const datosForm4 = new FormData();
  evento.stopPropagation();
  datosForm4.append("modificar",modificar );
  datosForm4.append("id_preg", id_preg);
  console.log(id_resp);
  datosForm4.append("id_resp", id_resp);
  datosForm4.append("content", modText.value);
  fetch("../dynamics/actualizar.php", {
  method:"POST", 
  body: datosForm4,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    console.log(datosJSON);
    despliegue();
  });

});
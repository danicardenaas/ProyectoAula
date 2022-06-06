const index = document.getElementById("indice");; 
const divForo = document.getElementById("foro");
const  enviar= document.getElementById("enviar");
const  resp= document.getElementById("resp");
const  preguntaNueva= document.getElementById("preguntaNueva");
const  enviar_res= document.getElementById("enviar_res");
//Petición para mostrar todas las preguntas en la base
divForo.innerHTML="";
var id_preg;
var duda;
const datosForm2= new FormData();
function despliegue(){
  divForo.innerHTML="";
  fetch("../dynamics/preguntas.php", {
    method:"POST", 
    body: datosForm2,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    console.log(datosJSON);
     for (pregunta of datosJSON.preguntas){
      duda = pregunta.ID_duda
      divForo.innerHTML += "<div id='"+pregunta.ID_duda+"'>"+pregunta.descripcion+"<br>";
      divForo.innerHTML += pregunta.fecha_pub+"  ";
      divForo.innerHTML += pregunta.usuario+"<button class='resp' id='"+pregunta.ID_duda+"'>Responder</button></div><br><br><br>";
      for(respuesta of datosJSON.respuestas)
      {
        for (respuestita of respuesta)
        {
          if(respuestita.ID_duda == duda )
          {
            console.log(respuestita.ID_duda+" =="+ duda );
            divForo.innerHTML += "<div style='margin-left:5vw ' id='"+respuestita.ID_dudaresp+"'>"+respuestita.descripcion+"<br>"+respuestita.fecha_pub+"  "+respuestita.usuario+"</div><br><br><br>";
          }
        }
        
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
  if(evento.target.classList.contains("resp"))
  {
    resp.style.display="block";
    resp.style.background="pink";
  }
  id_preg=evento.target.id;
});
enviar_res.addEventListener("click", (evento)=>{
  evento.preventDefault();
  console.log();
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
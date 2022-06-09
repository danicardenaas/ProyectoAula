const navbar = document.getElementById ("BarraDeNavegacion");
const nomClase = document.getElementById ("nombreClase");
const asignaciones = document.getElementById ("asignaciones");
const asignacion = document.getElementById ("asignacion");
const formEntrega= document.getElementById ("formEntrega");
const addArch= document.getElementById ("addArch");
const etiqArch= document.getElementById ("archivos");
const enviarTarea= document.getElementById ("enviarTarea");
const actEntregada= document.getElementById ("actEntregada");
const comentario= document.getElementById ("comentario");
const adjuntos= document.getElementById ("adjuntos");
const datosForm4 = new FormData(formEntrega);

cookies= document.cookie;
cookies = cookies.split(";");
var i =0;
var arch=1;
var cookieArray = new Array();
for (cookie of cookies)
{
   
    if(cookie.includes("id_materia"))
    {
        elemento = cookie.split("=");
    }
}
var materia = elemento[1];
var  ID_actividad;
const datosForm = new FormData();
const datosForm2 = new FormData();
function tareaf()
{
  
      fetch("../dynamics/ActividadEntregada.php", {
        method:"POST", 
        body: datosForm4,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        console.log(datosJSON);
        if(datosJSON.Info== null)
      {
        formEntrega.style.display="block";
        actEntregada.style.display="none";
        comentario.innerHTML="";
        adjuntos.innerHTML="";
      }
      else{
        console.log(datosJSON);
        comentario.innerHTML="";
        adjuntos.innerHTML="";
        formEntrega.style.display="none";
        actEntregada.style.display="block";
        comentario.innerHTML += "Entregado:"+datosJSON.Info.fecha_entr+"<br>";
        if(datosJSON.Info.coment_alumno != null)
        {
          comentario.innerHTML += "Comentarios añadidos por el alumno:"+datosJSON.Info.coment_alumno +"<br>";
        }
        if(datosJSON.Info.coment_profe != null)
        {
          comentario.innerHTML += "Comentarios añadidos por el profesor:"+datosJSON.Info.coment_profe +"<br>";
        }
        if(datosJSON.Info.calif != null)
        {
          comentario.innerHTML += "Calificación:"+datosJSON.Info.calif +"<br>";
        }
        adjuntos.innerHTML += "<ol>";
        for (archivo of datosJSON.archivos)
        {
    
          if(archivo.ID_tipoarch == 1)
          {
            adjuntos.innerHTML += "<a href='"+archivo.ruta+"'>"+archivo.ruta+"</a>";
          }
          else if(archivo.ID_tipoarch== 2){
            adjuntos.innerHTML +=  "<li><a download href='"+archivo.ruta+"' >Descargar tarea</a></li><br>";
            if(!archivo.ruta.includes("docx"))
            {
               adjuntos.innerHTML +=  "<embed src='"+archivo.ruta+"' width='50%'><br>";
            }
           
          }
        }
        adjuntos.innerHTML += "</ol>"
      }
      });
}
function muestraAsignaciones()
{
  actEntregada.style.display="none";
  formEntrega.style.display="none";
  asignaciones.innerHTML="";
    datosForm.append("id_materia", materia);
    fetch("../dynamics/vistaClase.php", {
        method:"POST", 
        body: datosForm,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
     
        nomClase.innerHTML=datosJSON.nombreMateria;
   
      });
      
      datosForm2.append("id_materia", materia);
    fetch("../dynamics/mostrarAct.php", {
        method:"POST", 
        body: datosForm2,
    }).then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
        for(tarea of datosJSON)
        {
          asignaciones.innerHTML+="<div class='actividad' id='"+tarea.ID_actividad+"'>"+tarea.nombre+"<br>"+tarea.fecha_limite+"<br></div><br>"
        }
    
  });
    
}

muestraAsignaciones();
//Ver una asignación
asignaciones.addEventListener("click", (evento)=>{
  
 
   

  if(evento.target.classList.contains("actividad"))
  { 
    asignaciones.innerHTML ="";  
    const datosForm3 = new FormData();
    datosForm3.append("id_actividad", evento.target.id);
    fetch("../dynamics/mostrarAct.php", {
        method:"POST", 
        body: datosForm3,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        console.log(datosJSON);  
        if(datosJSON.datos.ID_juego == null)
        {
          asignaciones.innerHTML ="<div>Fecha de publicación: "+datosJSON.datos.fecha_pub+"<br>";
          asignaciones.innerHTML +="Fecha limite de entrega: "+datosJSON.datos.fecha_limite +"<br>";
          asignaciones.innerHTML +="<h1>"+datosJSON.datos.nombre+"</h1>"+"Puntaje máximo: "+datosJSON.datos.puntaje+" <br>Tema: "+datosJSON.datos.tema+"<br>";
          asignaciones.innerHTML += "<strong>Indicaciones:</strong> <br>"+datosJSON.datos.indicaciones+"<br>"; 
          
          
          if(datosJSON.datos.rubrica != null && datosJSON.datos.rubrica != "")
          {
            asignaciones.innerHTML += "<strong>Rúbrica:</strong><br>"+datosJSON.datos.rubrica+"<br>"; 
          }
          if(datosJSON.datos.ruta_rubrica != null  && datosJSON.datos.ruta_rubrica != "")
          {
            asignaciones.innerHTML += "<strong>Rúbrica:</strong><<br><embed src='"+datosJSON.datos.ruta_rubrica+"' width='20%'><br>"; 
            
          }
          for (archivo of datosJSON.archivos)
          {
            if(archivo.ID_tipoArch == 1)//link
            {
              asignaciones.innerHTML += "<li><a href='"+archivo.ruta+"'>"+archivo.ruta+"</a></li><br>"; 
            }
            else if(archivo.ID_tipoArch == 2)//archivo
            {
              asignaciones.innerHTML += " <li><a download href='"+archivo.ruta+"' >Descargar material</a></li><br>";
              if(!archivo.ruta.includes("docx"))
              {
                asignaciones.innerHTML += "<embed src='"+archivo.ruta+"' width='20%'><br>"; 
              }
              
            }
          }
       
          asignaciones.innerHTML += "</div>"; 
          // botones.style.display="none";
        }
        else{
          asignaciones.innerHTML += "<button class='juego' id='"+datosJSON.datos.ID_juego +"'>Jugar</button>"; 
        }
      });
     
       //Petición para obtener si el alumno ya realizo una entrega
      ID_actividad=evento.target.id;
      datosForm4.append("id_actividad", ID_actividad);
     
      tareaf();
  }

  if(evento.target.classList.contains("juego")){
    document.cookie = "id_juego ="+ evento.target.id;      
  }
});

asignacion.addEventListener("click", ()=>{
    muestraAsignaciones();

});
addArch.addEventListener("click",(evento)=>{
  evento.preventDefault();
  arch++;
  etiqArch.innerHTML += " <input type='file' name='arch"+arch+"'><br>";
} );
enviarTarea.addEventListener("click", (evento)=>{
 
  evento.preventDefault();
  const datosForm5 = new FormData(formEntrega);
  datosForm5.append("CanArch", arch);
  datosForm5.append("id_actividad", ID_actividad);
  fetch("../dynamics/enviarTarea.php", {
    method:"POST", 
    body: datosForm5,
  }).then ((response) =>{
  return response.json();
  }).then ((datosJSON)=>{
  if(datosJSON==null)
  {
    formEntrega.style.display="block";
    actEntregada.style.display="none";
  }
  else{
    formEntrega.style.display="none";
    actEntregada.style.display="block";
   
  }
  tareaf();
      });
});
actEntregada.addEventListener("click", (evento)=>{
  if(evento.target.classList.contains("Eliminar"))
  {
    etiqArch.innerHTML=" <input type='file' name='arch1'><br>";
    const datosForm6 = new FormData();
    datosForm6.append("id_actividad", ID_actividad);
    fetch("../dynamics/borrarTarea.php", {
      method:"POST", 
      body: datosForm6,
    }).then ((response) =>{
    return response.json();
    }).then ((datosJSON)=>{
      formEntrega.style.display="block";
      actEntregada.style.display="none";
    });
  }
});
const navbar = document.getElementById ("BarraDeNavegacion");
const nomClase = document.getElementById ("nombreClase");
const btn_borrar = document.getElementById ("btn-borrar");
const asignacionC = document.getElementById ("asignacion");
const asignaciones = document.getElementById ("asignaciones");
const asignacion = document.getElementById ("asignacionVer");
const botones = document.getElementById ("botones");
const entregas= document.getElementById ("entregas");
const calificar= document.getElementById ("calificarForm");
const divcal= document.getElementById ("divCal");
const enviar= document.getElementById ("enviar");
const calif= document.getElementById ("calif");
const comentP= document.getElementById ("coment");
const datosForm3 = new FormData();
cookies= document.cookie;
cookies = cookies.split(";");
var i =0;
var alumno;
var entregaForm;
var cookieArray = new Array();
for (cookie of cookies)
{
    if(cookie.includes("id_materia"))
    {
        elemento = cookie.split("=");
    }
}
var materia = elemento[1];
function muestraEntregas(){
  fetch("../dynamics/mostrarEntregas.php", {
    method:"POST", 
    body: datosForm3,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    for(entrega of datosJSON)
    {
      console.log(entrega);
      entregas.innerHTML+="<div class='entrega "+entrega.usuario+"' id='"+entrega.ID_act_entrega+"'>"+entrega.usuario;
      if(entrega.calif != null)
      {
        console.log("hola");
        entregas.innerHTML+="   Calificación: "+entrega.calif+"</div>";
      }
      else{
        console.log("hola2");
        entregas.innerHTML+="      No calificado";
      }
      
    }
  })
}
function muestraAsignaciones()
{
  entregas.innerHTML="";
  
  const datosForm = new FormData();
    datosForm.append("id_materia", materia);
    fetch("../dynamics/vistaClase.php", {
        method:"POST", 
        body: datosForm,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        nomClase.innerHTML=datosJSON.nombreMateria;
      });
      const datosForm2 = new FormData();
      datosForm2.append("id_materia", materia);
    fetch("../dynamics/mostrarAct.php", {
        method:"POST", 
        body: datosForm2,
    }).then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
      asignaciones.innerHTML="";
        for(tarea of datosJSON)
        {
          asignaciones.innerHTML+="<div class='actividad' id='"+tarea.ID_actividad+"'>"+tarea.nombre+"<br>"+tarea.fecha_limite+"<br></div><br>"
        }
        botones.style.display="block";
  });
    
}

//al dar click en una ha de llevar a la pagina de entrega 

//
muestraAsignaciones();
asignaciones.addEventListener("click", (evento)=>{
 //
  if(evento.target.classList.contains("actividad"))
  { 
    asignaciones.innerHTML = "";  
    datosForm3.append("id_actividad", evento.target.id);
    fetch("../dynamics/mostrarAct.php", {
        method:"POST", 
        body: datosForm3,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
      
        if(datosJSON.datos.ID_juego == null || datosJSON.datos.ID_juego == undefined)
        {
          console.log(datosJSON);
          asignaciones.innerHTML ="<div>Fecha de publicación: "+datosJSON.datos.fecha_pub+"<br>";
          asignaciones.innerHTML +="Fecha limite de entrega: "+datosJSON.datos.fecha_limite +"<br>";
          asignaciones.innerHTML +="<h1>"+datosJSON.datos.nombre+"</h1>"+"Puntaje máximo: "+datosJSON.datos.puntaje+" <br>Tema: "+datosJSON.datos.tema+"<br>";
          asignaciones.innerHTML += "<strong>Indicaciones:</strong> <br>"+datosJSON.datos.indicaciones+"<br>"; 
          
          if(datosJSON.datos.rubrica != null && datosJSON.datos.rubrica != "")
          {
            asignaciones.innerHTML += "<strong>Rúbrica: </strong><br>"+datosJSON.datos.rubrica+"<br>"; 
          }
          if(datosJSON.datos.ruta_rubrica != null  && datosJSON.datos.ruta_rubrica != "")
          {
            asignaciones.innerHTML += "<strong>Rúbrica:</strong><br><embed src='"+datosJSON.datos.ruta_rubrica+"' width='20%'><br>"; 
            
          }
          asignaciones.innerHTML += "<strong>Material de consulta:</strong><br>"; 
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
          
        }
        else
       {  
          console.log("else"); 
          asignaciones.innerHTML += "<button class='juego' id='"+datosJSON.datos.ID_juego +"'>Jugar</button>"; 
       }
      });
      //Vista de todo lo entregado por los alumnos
     muestraEntregas();
  }
  if(evento.target.classList.contains("juego")){
    console.log("entre if");
    document.cookie = "id_juego ="+ evento.target.id;   

      window.location = "./trivia.html"; 


  }
});
btn_borrar.addEventListener("click", (evento)=>{
    const datosForm2 = new FormData();
    datosForm2.append("id_materia", materia);
    fetch("../dynamics/BorrarClase.php", {
        method:"POST", 
        body: datosForm2,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        if(datosJSON.ok)
        {
          window.location="./Tablero_tareas.php";
        }
        
      });
});
asignacionC.addEventListener("click", ()=>
{
  window.location="./AsignacionActs.html";
});
asignacion.addEventListener("click", ()=>{
  muestraAsignaciones();
});
entregas.addEventListener("click", (evento)=>{
  if(evento.target.classList.contains("entrega"))
  { 
    alumno=evento.target.classList[1];

    //ver la entrega de un alumno
    const datosForm3 = new FormData();
    entregaForm =  evento.target.id;
    datosForm3.append("id_entrega", entregaForm);
    fetch("../dynamics/mostrarEntregas.php", {
      method:"POST", 
      body: datosForm3,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      divcal.innerHTML+="ALUMNO: "+alumno+"<br>";
      console.log(datosJSON);
      for (entrega of datosJSON)
      {
        console.log(entrega);
        divcal.innerHTML += "Comentario del alumno: "+entrega.coment_alumno;
        if(entrega.ID_tipoarch == 1)//link
            {
              divcal.innerHTML += "<li><a href='"+entrega.ruta+"'>"+entrega.ruta+"</a></li><br>"; 
            }
        else if(entrega.ID_tipoarch == 2)//archivo
            {
              divcal.innerHTML += " <li><a download href='"+entrega.ruta+"' >Descargar material</a></li><br>";
              if(!entrega.ruta.includes("docx"))
              {
                divcal.innerHTML += "<embed src='"+entrega.ruta+"' width='20%'><br>"; 
              }
              
            }
      }

    });


    //CALIFICARLA
    entregas.innerHTML="";
    divcal.style.display="block";
  
  }
});

divcal.addEventListener("click", (evento)=>{

 if(evento.target.id == "enviar")
 {
    // console.log(calificar.children);
    calificar.children[0].value = document.getElementById("calif").value;
    calificar.children[2].value = document.getElementById("coment").value;
    const datosForm4= new FormData(calificar);
    // console.log(calificar.children[0].value,"Esto viene del form");
    // console.log(calificar.children[2].value,"Esto viene del form");
    datosForm4.append("id_entrega", entregaForm);
    // console.log(document.getElementById("calif").value,"Esto viene del elemento");
    // console.log(document.getElementById("coment").value,"Esto viene del elemento");
    // console.log(datosForm4);
 
    fetch("../dynamics/insertarCalif.php", {
      method:"POST", 
      body: datosForm4,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      if(!datosJSON)
      {
        alert("Algo salió mal");
      }
      else{
        divcal.style.display="none";
        muestraEntregas();
      }

    })
 }
});
calif.addEventListener("keyup", ()=>
{
  console.log("aaa");
});
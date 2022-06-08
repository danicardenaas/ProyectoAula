const tablon= document.getElementById ("tablon");
const filtrado= document.getElementById ("filtrado");
const materia= document.getElementById ("materia");
const usuarioBuscado= document.getElementById ("usuarioBuscado");
const tipo= document.getElementById ("tipo");
const form= document.getElementById ("form");
// const cuadro= document.getElementById ("cuadro-blanco");
var usuario;
function muestraMaterial(){
  switch (filtrado.value)
  {
    case "0":
      {
        materia.style.display="none";
        usuarioBuscado.style.display="none";
        tipo.style.display="none";
        break;
      }
    case "1":
      {
        materia.style.display="block";
        usuarioBuscado.style.display="none";
        tipo.style.display="none";
        break;
      }
    case "2":
      {
        materia.style.display="none";
        usuarioBuscado.style.display="block";
        tipo.style.display="none";
        break;
      }
    case "4":
      {
        materia.style.display="none";
        usuarioBuscado.style.display="none";
        tipo.style.display="block";
        break;
      }

  }
  const datosForm = new FormData(form);
  datosForm.append("filtro", filtrado.value);
  tablon.innerHTML="";
  fetch("../dynamics/mostrarMateriales.php", {
    method:"POST", 
    body: datosForm,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    console.log(datosJSON);
    i=0;
    usuario=datosJSON.usuario;
    for(material of datosJSON.res)
    {
      const div = document.createElement("div");
      div.classList.add("MaterialHoja");
      div.innerHTML+="<div><span>"+material.Likes+"</span> <button class='like' id='"+material.ID_material+"'>Like</button></div>";
      div.innerHTML+="<div class='usuario' id='"+material.ID_usuario+"'>De: "+datosJSON.usuarios[i]+"<br>Subido: "+material.fecha+"</div>";
      div.innerHTML+="<div id='"+material.ID_material+"'>Materia: "+datosJSON.materias[i]+"</div>";
      div.innerHTML+="<div id='"+material.ID_material+"'>Tipo de material: "+datosJSON.tipos[i]+"</div>";
      div.innerHTML+="<div id='"+material.ID_material+"'>Tema: "+material.Tema+"</div>";
      div.innerHTML+="<div id='"+material.ID_material+"'>Unidad: "+material.Unidad+"</div>";
      div.innerHTML+="<div id='"+material.ID_material+"'>Tema: "+material.Descripcion+"</div>";
      for(archivo of datosJSON.arch[i])
      {
        div.innerHTML += " <li><a download href='"+archivo.ruta+"' >Descargar material</a></li><br>";
        if(!archivo.ruta.includes("docx"))
        {
          div.innerHTML += "<embed class='prevista' src='"+archivo.ruta+"' width='20%'><br>"; 
        }
      }
      div.innerHTML+="<div><span></span> <button class='reportar' id='"+material.ID_material+"'>Reportar</button></div>";
      if(datosJSON.rol == 3 || datosJSON.rol == 4)
      {
        div.innerHTML+="<div><span></span> <button class='borrar' id='"+material.ID_material+"'>Borrar</button></div>";
      }
      
      tablon.append(div);
      i++;
    }
    
  });
}
muestraMaterial();
filtrado.addEventListener("change", (evento)=>{
  muestraMaterial();
});
tipo.addEventListener("change", (evento)=>{
  muestraMaterial();
});
materia.addEventListener("change", (evento)=>{
  muestraMaterial();
})
usuarioBuscado.addEventListener("change", (evento)=>{
  muestraMaterial();
})

usuarioBuscado.addEventListener("keyup", (evento)=>{
  muestraMaterial();
})

tablon.addEventListener("click", (evento)=>{
  if(evento.target.classList.contains("usuario"))
  {
    console.log(evento.target.id);
    //puede mandarse el id del usuario así :)
  }
  if(evento.target.classList.contains("reportar"))
  {
    //peticion para reportar
    const datosForm3 = new FormData();
    datosForm3.append("material", evento.target.id);
    datosForm3.append("reportar", 1);
    fetch("../dynamics/materialBorrar.php", {
      method:"POST", 
      body: datosForm3,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      if(!datosJSON)
      {
        alert("Algo salió mal");
      }
      else{
        muestraMaterial();
      }
    });
  }
  if(evento.target.classList.contains("borrar"))
  {
    //peticion para borrar
    const datosForm2 = new FormData();
    datosForm2.append("material", evento.target.id);
    datosForm2.append("reportar", 0);
    fetch("../dynamics/materialBorrar.php", {
      method:"POST", 
      body: datosForm2,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      if(!datosJSON)
      {
        alert("Algo salió mal");
      }
      else{
        muestraMaterial();
      }
    });
  }
  if(evento.target.classList.contains("like"))
  {
    const datosForm1 = new FormData();
  
    if(evento.target.classList.contains(usuario))
    {
      evento.target.classList.remove(usuario);
      evento.target.style.background="grey";
      //quitar like
      datosForm1.append("likes", -1);

    }
    else{
      datosForm1.append("likes", 1);
      evento.target.classList.add(usuario);
      evento.target.style.background="pink";
    }
    //peticion para actualizar los likes
    datosForm1.append("material", evento.target.id);
    fetch("../dynamics/materialLikes.php", {
      method:"POST", 
      body: datosForm1,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      console.log(datosJSON);
      evento.target.previousElementSibling.innerHTML=datosJSON;
    
    });
  }
})


const tablon= document.getElementById ("tablon");
const filtrado= document.getElementById ("filtrado");
const materia= document.getElementById ("materia");
const usuarioBuscado= document.getElementById ("usuarioBuscado");
const tipo= document.getElementById ("tipo");
const form= document.getElementById ("form");
const reportados= document.getElementById ("reportados");
const reportado= document.getElementById ("reportado");
const favoritos= document.getElementById ("favoritos");
const boton = document.createElement("button");
var pagRepor = 0;
var pagFav = 0;
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
    case "3":
      {
        materia.style.display="none";
        usuarioBuscado.style.display="none";
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
  datosForm.append("reportados", pagRepor);
  datosForm.append("favoritos", pagFav);
  tablon.innerHTML="";
  fetch("../dynamics/mostrarMateriales.php", {
    method:"POST", 
    body: datosForm,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    // console.log(datosJSON);
    i=0;
    if(datosJSON.rol == 3 || datosJSON.rol ==4)
    {
      reportado.style.display="block";
    }
    if(datosJSON.res[0] != null)
    {
    
      for(material of datosJSON.res)
      { 
        usuario =datosJSON.usuario;
        const div = document.createElement("div");
        div.classList.add("MaterialHoja");
        
        div.innerHTML+="<span>"+material.Likes+"</span>";
        //saber si ya tiene like
        boton.innerHTML="Like";
        boton.style.background="grey";
        boton.classList.add("like");
        boton.id=material.ID_material;
        boton.classList.remove("ya");
        for(gusto of datosJSON.Favoritos)
        {
          // console.log(gusto);
        
          if(gusto.ID_material == material.ID_material)
          {   
              // console.log(usuario);
              boton.classList.add("ya");
              boton.style.background="pink";
              boton.innerHTML="Deslike";
              div.append(boton);
          }
          else{
           
            div.append(boton);
            
          }
        }        
  
        div.append(boton);
        div.innerHTML+="<div class='usuario' id='"+material.ID_usuario+"'>De: "+datosJSON.usuarios[i]+"<br>Subido: "+material.fecha+"</div>";
        div.innerHTML+="<div id='"+material.ID_material+"'>Materia: "+datosJSON.materias[i]+"</div>";
        div.innerHTML+="<div id='"+material.ID_material+"'>Tipo de material: "+datosJSON.tipos[i]+"</div>";
        div.innerHTML+="<div id='"+material.ID_material+"'>Tema: "+material.Tema+"</div>";
        div.innerHTML+="<div id='"+material.ID_material+"'>Unidad: "+material.Unidad+"</div>";
        div.innerHTML+="<div id='"+material.ID_material+"'>Descripción: "+material.Descripcion+"</div>";
      if(datosJSON.arch[i])
      {
        for(archivo of datosJSON.arch[i])
        {
          div.innerHTML += " <li><a download href='"+archivo.ruta+"' >Descargar material</a></li><br>";
          if(!archivo.ruta.includes("docx"))
          {
            div.innerHTML += "<embed class='prevista' src='"+archivo.ruta+"' width='20%'><br>"; 
          }
        }
      }
        
        if(pagRepor==0)
        {
          div.innerHTML+="<div><span></span> <button class='reportar' id='"+material.ID_material+"'>Reportar</button></div>";
        }
       
        if(datosJSON.rol == 3 || datosJSON.rol == 4)
        {
          div.innerHTML+="<div><span></span> <button class='borrar' id='"+material.ID_material+"'>Borrar</button></div>";
          if(pagRepor==1)
          {
            div.innerHTML+="<div><span></span> <button class='desreportar' id='"+material.ID_material+"'>Quitar reporte</button></div>";
          }
         
        }
        
        tablon.append(div);
        i++;
      
      }
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
    // console.log(evento.target.id);
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
  if(evento.target.classList.contains("desreportar"))
  {
    //peticion para reportar
    const datosForm4 = new FormData();
    datosForm4.append("material", evento.target.id);
    datosForm4.append("reportar", 2);
    fetch("../dynamics/materialBorrar.php", {
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
  
    if(evento.target.classList.contains("ya"))
    {
      // evento.target.classList.remove("ya");
      // evento.target.style.background="grey";
      // evento.target.innerHTML="Like";
      //quitar like
      datosForm1.append("likes", "NO");
      // console.log("bb");
    }
    else{
      // console.log("aa");
      datosForm1.append("likes", "SI");
      // evento.target.classList.add("ya");
      // evento.target.style.background="pink";
      // evento.target.innerHTML="Deslike";
    }
    //peticion para actualizar los likes
  
    datosForm1.append("material", evento.target.id);
    fetch("../dynamics/materialLikes.php", {
      method:"POST", 
      body: datosForm1,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
      // console.log(datosJSON);
      muestraMaterial();
    });
  }
})

reportados.addEventListener("change", ()=>
{
 
  if(pagRepor==0)
  {
    pagRepor=1;
    muestraMaterial();
  }
  else{
    pagRepor=0
    muestraMaterial();
  }
  // console.log(pagRepor);
});
favoritos.addEventListener("change", ()=>
{
 
  if(pagFav==0)
  {
    pagFav=1;
    muestraMaterial();
  }
  else{
    pagFav=0
    muestraMaterial();
  }

});
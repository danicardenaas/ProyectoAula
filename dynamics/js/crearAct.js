const form = document.getElementById("form");
const enviar = document.getElementById("btn_enviar");
const addLink = document.getElementById("agregarLink");
const addArch= document.getElementById("agregarArch");
const etiqLink= document.getElementById("linkExtra");
const etiqArch= document.getElementById("archExtra");
var link=1;
var arch=1;
cookies= document.cookie;
cookies = cookies.split(";");
var cookieArray = new Array();
for (cookie of cookies)
{
   
    if(cookie.includes("id_materia"))
    {
        elemento = cookie.split("=");
    }
}
var materia = elemento[1];
//insertar todos los datos en la base de datos al presionar enviar
enviar.addEventListener("click", (evento)=>{
  console.log(materia);
    evento.preventDefault();
    let datosForm = new FormData(form);
    datosForm.append("linkC", link);
    datosForm.append("archC", arch);
    datosForm.append("id_materia", materia);
    fetch("../dynamics/crearAct.php", {
    method:"POST", 
    body: datosForm,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
   
    if(datosJSON.ok)
    {
      window.location="./claseProf.php";
    }
    else{
      alert(datosJSON.texto);
    }
    
  });
})
addLink.addEventListener("click",(evento)=>{
  evento.preventDefault();
  link++;
  etiqLink.innerHTML += " <input type='text' name='link"+link+"'>";
   
  // console.log(link)
} );
addArch.addEventListener("click",(evento)=>{
  evento.preventDefault();
  arch++;
  etiqArch.innerHTML += " <input type='file' name='arch"+arch+"'>";
  
} );

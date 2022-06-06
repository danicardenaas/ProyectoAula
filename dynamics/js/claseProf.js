const navbar = document.getElementById ("BarraDeNavegacion");
const nomClase = document.getElementById ("nombreClase");
const btn_borrar = document.getElementById ("btn-borrar");
const asignacionC = document.getElementById ("asignacion");

cookies= document.cookie;
cookies = cookies.split(";");
var i =0;
var cookieArray = new Array();
for (cookie of cookies)
{
   
    if(cookie.includes("id_materia"))
    {
        elemento = cookie.split("=");
    }
}
var materia = elemento[1];
const datosForm = new FormData();
datosForm.append("materia", materia);
fetch("../dynamics/vistaClase.php", {
    method:"POST", 
    body: datosForm,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{

    nomClase.innerHTML=datosJSON.nombreMateria;
    anuncios();
  });


//sacar un fetch con la info de la clase
function anuncios ()
{
    //abre los anuncios
}

function materiales ()
{
    //abre los materiales
}
function asignaciones ()
{
   //abre las asignaciones
}


navbar.addEventListener("click", (evento)=>{
  
    switch (evento.target.id)
    {
        case "anuncios":
            {
                anuncios();
                break;
            }
        case "materiales":
            {
                materiales();
                break;
            }
        case "asignaciones":
            {
                asignaciones();
                break;
            }

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
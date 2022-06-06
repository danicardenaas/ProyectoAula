const form = document.getElementById("form");
const enviar = document.getElementById("btn_enviar");


//insertar todos los datos en la base de datos al presionar enviar
enviar.addEventListener("click", (evento)=>{
    console.log("hola");
    evento.preventDefault();
let datosForm = new FormData(form);
    fetch("../dynamics/crearAct.php", {
    method:"POST", 
    body: datosForm,
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    alert(datosJSON.texto);
  });
})


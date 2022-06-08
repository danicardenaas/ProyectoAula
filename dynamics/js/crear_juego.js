const btnAgregar = document.getElementById("btn-agregar"); 
const btnEnviar = document.getElementById("btn-enviar");
const divContenedor = document.getElementById("contenedor-juego"); 
const formPregunta = document.getElementById("form-pregunta")
const confirmacion = document.getElementById("nota"); 
const pregunta1 = document.getElementById("pregunta1"); 
var pregunta = 1; 

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

btnAgregar.addEventListener("click", (evento)=>{
    pregunta ++; 
    if(pregunta == 11)
    {
        alert("El número máximo de preguntas es 10"); 
        btnAgregar.style.display = "none"; 
    }
    else
    {
        const nueva = document.createElement("div"); 
        formPregunta.insertBefore(nueva, confirmacion); 
        nueva.id = "pregunta"+ pregunta; 
        nueva.innerHTML += '<h1>Pregunta '+ pregunta + '</h1>'; 
        nueva.innerHTML += '<div class="campo-form">'; 
        nueva.innerHTML += '<label>Pregunta</label>'; 
        nueva.innerHTML += '<input type="text" name="pregunta'+pregunta+'" id="pregunta" placeholder="Pregunta"> </div>'; 
        nueva.innerHTML += '<div class="campo-form">'; 
        nueva.innerHTML += '<label>Respuesta correcta</label>'; 
        nueva.innerHTML += '<input type="text" name="res1-'+pregunta+'" id="res1" placeholder="Respuesta correcta"></div>'; 
        nueva.innerHTML += '<div class="campo-form">'; 
        nueva.innerHTML += '<label>Respuesta incorrecta</label>';  
        nueva.innerHTML += '<input type="text" name="res2-'+pregunta+'" id="res2" placeholder="Respuesta incorrecta"></div>'; 
        nueva.innerHTML += '<div class="campo-form">'; 
        nueva.innerHTML += '<label>Respuesta incorrecta</label>';  
        nueva.innerHTML += '<input type="text" name="res3-'+pregunta+'" id="res3" placeholder="Respuesta incorrecta"></div>'; 
        nueva.innerHTML += '<div class="campo-form"><label>Imagen pregunta</label>'; 
        nueva.innerHTML += '<input type="file" name="img'+pregunta+'" id="imagen"></div>'; 
    }  

 
   
}); 

btnEnviar.addEventListener("click", (evento) =>
{{
    evento.preventDefault(); 
    const datosForm = new FormData(formPregunta);
    datosForm.append("ID_materia", materia); 
    fetch("../dynamics/datosJuego.php", {
        method:"POST", 
        body: datosForm,
    }).then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
        if(datosJSON.ok==false)
            alert(datosJSON.texto); 
        console.log("lol"); 
    })
     
}});

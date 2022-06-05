const btn = document.getElementById("prueba"); 
var preguntita; 

fetch("../dynamics/trivia.php")
    .then ((response) =>{
        return response.json();
  }).then ((datosJSON)=>{
        console.log(datosJSON);
        // nomClase.innerHTML=datosJSON.nombreMateria;
        // anuncios();
        preguntita = datosJSON.pregunta[1]; 
        console.log(datosJSON.pregunta[2]);
        console.log(datosJSON.respuesta[2][0].respuesta); 
  });

btn.addEventListener("click", (evento) =>{
    console.log(preguntita); 
}); 


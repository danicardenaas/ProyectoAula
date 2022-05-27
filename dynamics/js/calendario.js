const titulo = document.getElementById("titulo2");
const mes = document.getElementById("cuad1");
const anuncios = document.getElementById("salir1");
const inicio = document.getElementById("volver_inicio");
const asistir = document.getElementById("boton3");
const rechazar = document.getElementById("boton4");

anuncios.addEventListener("click", ()=>{
    window.location.href = "./anuncios.html";
})
// anuncios.addEventListener("mouseover", () =>{
//     anuncios.style.backgroundColor = "#D1A11F"
// })
inicio.addEventListener("click", ()=>{
    window.location.href = "./inicioConSesion.php";
})

asistir.addEventListener("click", ()=>{
    alert("Has marcado que quieres asistir a este evento");
})

rechazar.addEventListener("click", ()=>{
    alert("Has marcado que rechazas asistir a este evento");
})


const h1nombre = document.getElementById("bienvenida"); 
const btn_prueba = document.getElementById("prueba"); 
const aCalendario =document.getElementById("calendario"); 
const divCalendario = document.getElementById("cuadroCalen"); 

//verificar si ya se inició sesión por lo mientras con un btn

btn_prueba.addEventListener("click", (evento) => {
    console.log("click"); 
    h1nombre.innerHTML += "Nombre usuario: ---- sesión"; 
}); 

aCalendario.addEventListener("mouseenter", (evento) =>{
    divCalendario.style.display = "flex"; 
}); 

aCalendario.addEventListener("mouseleave", (evento) =>{
    divCalendario.style.display = "none"; 
}); 


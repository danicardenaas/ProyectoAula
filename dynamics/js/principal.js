// const h1nombre = document.getElementById("bienvenida"); 
// const btn_prueba = document.getElementById("prueba"); 
const aCalendario =document.getElementById("calendario"); 
const fotos=document.getElementById("fotos"); 
const divCalendario = document.getElementById("x");
var calendarioAbierto=false;
const cuadroCalen = document.createElement("div");

cuadroCalen.innerHTML="<a><img src='../Imgs/calendario.jpg' alt='calendario' id='imgCalen'/></a><br/><a href='./calendario.html'><button id='amarillo'>Ver</button></a>";



// //verificar si ya se inició sesión por lo mientras con un btn

// // btn_prueba.addEventListener("click", (evento) => {
// //     console.log("click"); 
// //     h1nombre.innerHTML += "Nombre usuario: ---- sesión"; 
// // }); 

// aCalendario.addEventListener("mouseenter", (evento) =>{
//     divCalendario.style.display = "flex"; 
// }); 

aCalendario.addEventListener("click", (evento) =>{
    if(calendarioAbierto==false){
    
        divCalendario.appendChild(cuadroCalen);
        calendarioAbierto=true;
        divCalendario.id="cuadroCalen";
    }
    else{
         divCalendario.removeChild(cuadroCalen);
        
        divCalendario.id="x";
       
        calendarioAbierto=false;
    }
                
}); 


const divCuadro = document.getElementById(contenedor); 
const inicio = document.getElementById("inicio");

inicio.addEventListener("click", ()=>{
    window.location.href = "./inicioConSesion.php";
})


//hasta tener el html funcional
// divCuadro.addEventListener("mouseover", (evento) =>{
//     console.log("Dentro del evento"); 
//     divCuadro.innerHTML="<div class='juego'><strong>Nombre"+"Aquí agregar desde JSON"+"</strong></div>"; 
//     divCuadro.innerHTML+="<div class='juego'><strong>Descripción"+"Aquí datos JSON"+"</strong></div>"; 
//     divCuadro.innerHTML+="<div class='juego'>"+"<button class='boton-azul'></button>"+"Referencia boton jugar"+"</strong></div>"; 
//     divCuadro.style.display = "flex"; 
// }); 
const index = document.getElementById("indice"); 
const divForo = document.getElementById("foro")

index.addEventListener("mouseenter", (evento) =>{
    divForo.style.display = "flex"; 
}); 

index.addEventListener("mouseleave", (evento) =>{
    divForo.style.display = "none"; 
}); 
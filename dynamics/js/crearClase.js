const btn_enviar = document.getElementById("btn-enviar");
const contra = document.getElementById("contrasena");
const privada = document.getElementById("privada");
const publica = document.getElementById("publica");
const form = document.getElementById("contenedor");
console.log(form);
privada.addEventListener("change", ()=>
{

    contra.style.display="inline";

})
publica.addEventListener("change", ()=>
{
    console.log(privada.value);
    contra.style.display="none";

})
btn_enviar.addEventListener("click", (evento)=>{
    evento.preventDefault();
    const datosForm= new FormData(form);
    datosForm.append("fetch", 1);
    fetch("../dynamics/datosCrearClase.php", {
      method:"POST", 
      body: datosForm,
    }).then ((response) =>{
      return response.json();
    }).then ((datosJSON)=>{
        if(!datosJSON.ok)
        {
            alert (datosJSON.texto);
        }
        else{
            window.location="./Tablero_tareas.php";
        }
    })
});
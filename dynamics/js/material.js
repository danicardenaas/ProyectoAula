const addArch= document.getElementById ("addArch");
const form= document.getElementById ("formSubir");
const enviar= document.getElementById ("enviar");

var arch=1;
const etiqArch= document.getElementById ("archivos");
addArch.addEventListener("click",(evento)=>{
    evento.preventDefault();
    arch++;
    etiqArch.innerHTML += " <input type='file' name='arch"+arch+"'><br>";
});
enviar.addEventListener("click", (evento)=>{
    const datosForm = new FormData(form);
    evento.preventDefault();
    datosForm.append("cantArch", arch);
    fetch("../dynamics/subirMaterial.php", {
        method:"POST", 
        body: datosForm,
      }).then ((response) =>{
        return response.json();
      }).then ((datosJSON)=>{
        if(!datosJSON.ok)
        {
            alert(datosJSON.texto);
        }
        else{
          window.location="./tablon.php";
        }

    });
});
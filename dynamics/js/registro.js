const preguntaGrupo = document.getElementById("grupo");
const preguntaSeccion =  document.getElementById("seccion");
const preguntaSeccionL =  document.getElementById("seccionlabel");
const preguntaCuenta = document.getElementById("cuenta");
const preguntaRFC = document.getElementById("rfc");
const rol = document.getElementById("rol");
const enviar = document.getElementById("registrarme");
const form = document.getElementById("form-registro");


preguntaCuenta.style.display="inline";
preguntaGrupo.style.display="block";
preguntaSeccion.style.display="inline";
preguntaRFC.style.display="none";
preguntaSeccionL.style.display="inline";

rol.addEventListener("change", ()=>{
    if(rol.value==1)
    {
        //preguntas para alumnos
        preguntaCuenta.style.display="inline";
        preguntaGrupo.style.display="inline";
        preguntaSeccion.style.display="inline";
        preguntaRFC.style.display="none";
        preguntaSeccionL.style.display="inline";
    }
     if(rol.value==2)
    {
        //preguntas para profesores
        preguntaCuenta.style.display="none";
        preguntaGrupo.style.display="none";
        preguntaSeccion.style.display="none";
        preguntaRFC.style.display="inline";
        preguntaSeccionL.style.display="none";
    }
});
enviar.addEventListener("click", (evento)=>{
    evento.preventDefault();
    let datosForm = new FormData(form);
    //Petición para procesar los datos del registro
    fetch ("../dynamics/datosregistro.php", {
        method: "POST",
        body: datosForm ,
    })
    .then ((response)=> {
        return response.json();
    })
    .then ((datosJSON) => {
        if(datosJSON.ok == true)
        {
            datosForm="";
            //redireccionar
            window.location.href = "../templates/inicio.php";
        }
        else{
            alert (datosJSON.texto);
            //avisar del error
        }
    })
});
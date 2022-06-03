const buscador = document.getElementById("input-buscador");
const divResultados = document.getElementById("resultados");
const registrar = document.getElementById("registro");

function resultados(evento) {

    let termino = buscador.value;
    console.log(termino);
    divResultados.innerHTML = "";
    if (termino.length >= 2) {
        fetch("../dynamics/BuscarClase.php?clase=" + termino)
        .then((response) => {
            return response.json();
        })
        .then((datosJSON) => {
            divResultados.innerHTML = "";
            for (materia of datosJSON) {
        
                let div = document.createElement("div");
                div.innerHTML = materia.nombreMateria;
                div.id = materia.id_materia;
                div.classList.add("Coincidencia");
                divResultados.appendChild(div);    
            }
            if (datosJSON.length == 0) {
            let div = document.createElement("div");
            div.innerHTML = "No se encontraron resultados.";;

            divResultados.appendChild(div);
          
            }
        });
    }
}
buscador.addEventListener("change", resultados);
buscador.addEventListener("keyup", resultados);
buscador.addEventListener("click", resultados);

divResultados.addEventListener("click", (evento) => {
    divResultados.innerHTML = "";
    if (evento.target.classList.contains("Coincidencia")) {
        let materia=evento.target.id;
        
        const datosForm= new FormData();
        
        datosForm.append("id_materia", materia);
        fetch("../dynamics/clase.php", {
            method:"POST", 
            body: datosForm,
        }).then ((response) =>{
            return response.json();
        }).then ((datosJSON)=>{
            if(datosJSON.inscrito)
            {
            //redireccionar a la pestaña
                console.log("si");
                window.location= "./clase.php";
            }
            else if(!datosJSON.inscrito)
            {
                console.log("no");
                
                registrar.style.display = "";
                cuadroRegistro.id="Form registro";
    
            }
        });
    }
  });
const buscador = document.getElementById("input-buscador");
const divResultados = document.getElementById("resultados");
const registrar = document.getElementById("registro");
const btn_reg = document.getElementById('btn-registrar');;
const input = document.getElementById("contrasena");;
var desbloquear;
var materia;
var contra = null;
function resultados(evento) {

    let termino = buscador.value;
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
         materia=evento.target.id;
        
        const datosForm= new FormData();
        
        datosForm.append("id_materia", materia);
        datosForm.append("fetch", 1);
        fetch("../dynamics/clase.php", {
            method:"POST", 
            body: datosForm,
        }).then ((response) =>{
            return response.json();
        }).then ((datosJSON)=>{
            if(datosJSON.inscrito)
            {
            //redireccionar a la pestaña
        
                if(datosJSON.rol == null)
                {
                window.location= "./clase.php";
                }    
                else{
                //tiene vista de profesor
                window.location= "./claseProf.php";
                }   
                document.cookie = "id_materia ="+ materia;
            }
            else if(!datosJSON.inscrito)
            {
      
                registrar.style.display = "block";
    
                contra = datosJSON.datosMat.contrasena ;
                if(datosJSON.datosMat.contrasena != null)
                {  
                    input.style.display = "block";
                    desbloquear=false;
                }
                else{
                    desbloquear =true;
                }
                
            }
        });
    }
  });


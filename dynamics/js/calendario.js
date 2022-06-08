const titulo = document.getElementById("titulo2");
const mes = document.getElementById("cuad1");
const cuadradoDatos = document.getElementById("cuad2");
const imagen = document.getElementById("ccb");
const anuncios = document.getElementById("salir1");
const inicio = document.getElementById("volver_inicio");
// const asistir = document.getElementById("boton3");
// const rechazar = document.getElementById("boton4");
const dias = document.getElementsByTagName("td");
const mes1 = document.getElementById("mes");
const btn_prox = document.createElement("button");
const btn_anterior = document.createElement("button");
const btn_agregar = document.createElement("button");
const calendario = document.getElementById("calendario");
const form = document.getElementById("formularioAdd");
const btn_enviar = document.getElementById("btn-enviar");
const para = document.getElementById("para");
const grupol = document.getElementById("grupol");
const seccionl = document.getElementById("seccionl");
const grupo = document.getElementById("grupo");
const seccion = document.getElementById("seccion");
const gradol= document.getElementById("gradol");
const grado= document.getElementById("grado");
const datos= document.getElementById("datos");
btn_prox.innerHTML="siguiente";
btn_anterior.innerHTML="anterior";
btn_agregar.innerHTML="agregar";
titulo.append(btn_prox);
titulo.append(btn_anterior );
var objetivo;
var dia1;
var rol;
var ultimo;
var mesAct;
var año;
var proximo=0;
function peticion()
{
    datosForm.append ("masMes", proximo);
    fetch("../dynamics/calendario.php", {
        method:"POST", 
        body: datosForm,
    }).then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
    
        ultimo=datosJSON.ultimo;
        dia1=datosJSON.primero;
        mesAct=datosJSON.mes;
        año=datosJSON.año;
        switch(datosJSON.mes)
        {
            case 1:
                {
                    mes1.innerHTML="Enero "+año;
                    break;
                }
            case 2:
            {
                mes1.innerHTML="Febrero "+año;
                break;
            }
            case 3:
                {
                    mes1.innerHTML="Marzo "+año;
                    break;
                }
            case 4:
                {
                    mes1.innerHTML="Abril "+año;
                    break;
                }
            case 5:
                {
                    mes1.innerHTML="Mayo "+año;
                    break;
                }
            case 6:
                {
                    mes1.innerHTML="Junio "+año;
                    break;
                }
            case 7:
                {
                    mes1.innerHTML="Julio "+año;
                    break;
                }
            case 8:
                {
                    mes1.innerHTML="Agosto "+año;
                    break;
                }
            case 9:
                {
                    mes1.innerHTML="Septiembre "+año;
                    break;
                }
            case 10:
                {
                    mes1.innerHTML="Octubre "+año;
                    break;
                }
            case 11:
                {
                    mes1.innerHTML="Noviembre "+año;
                    break;
                }
            case 12:
                {
                    mes1.innerHTML="Diciembre "+año;
                    break;
                }
        }
        var num = 1;
        var dia = dia1;
        rol=datosJSON.rol;
        if(datosJSON.rol ==3)
        {
            titulo.append(btn_agregar);

        }
        while (num<=ultimo)
        {
        
            dias[dia].innerHTML=num;
            num++;
            dia++;
            if(num<10)
            {
                numImp="0"+num;
            }
            else{
                numImp=num;
            }
            if(mesAct<10)
            {
                dias[dia].id=año+"-"+"0"+mesAct+"-"+numImp;
            }
            else{
                dias[dia].id=año+"-"+mesAct+"-"+numImp;
            }
            
            if(datosJSON.todos.includes(dias[dia].id)){
                // console.log(datosJSON.todos);
                dias[dia].style.background="pink";
                // console.log(dias[dia]);
            }
            else{
                dias[dia].style.background="white";
            }
            // for(dia of dias)
            // {
            //      if(datosJSON.Todos.contains("fecha"))
            //      var cuadrito = document.getElementById(fecha);
              
            //      cuadrito.style.background="pink";
            //      x++;
            // }
        }
    })

}

const datosForm= new FormData();
peticion();
btn_prox.addEventListener("click", ()=>{

    proximo++;
    for(dia of dias)
    {
        dia.innerHTML="";
    }
    peticion();
});
btn_anterior.addEventListener("click", ()=>{
   
      proximo--;  

    
    for(dia of dias)
    {
        dia.innerHTML="";
    }
    peticion();
});
inicio.addEventListener("click", ()=>{
    window.location = "./inicioConSesion.php";
})

// asistir.addEventListener("click", ()=>{
//     alert("Has marcado que quieres asistir a este evento");
// })

// rechazar.addEventListener("click", ()=>{
//     alert("Has marcado que rechazas asistir a este evento");
// })
calendario.addEventListener("click", (evento) => {
   var fecha=evento.target.id;
   datosForm.append ("fecha", fecha);
   fetch("../dynamics/calendarioEvento.php", {
       method:"POST", 
       body: datosForm,
   }).then ((response) =>{
       return response.json();
   }).then ((datosJSON)=>{
    cuadradoDatos.innerHTML ="";
       if(datosJSON.eventos[0] == "no")
       {
            cuadradoDatos.innerHTML = "No hay eventos :)";
       }
       else{
           var evento = datosJSON.eventos;
            for(suceso of evento)
            {
                // console.log(suceso);
                cuadradoDatos.innerHTML += "<br><br><br>"+suceso.fecha + "<br>" + suceso.descripcion;
                cuadradoDatos.innerHTML += "<br><br><img src =' "+suceso.ruta_imagen+"' height='40vh'>";
                if(rol==3)
                {
                    cuadradoDatos.innerHTML += "<button class='borrar' id= '"+suceso.ID_evento+"'>Borrar</button>";

                }
            }
          
       }

   });
    
});
cuadradoDatos.addEventListener("click", (evento)=>{
    if(evento.target.classList.contains("borrar"))
    {
        let datosForm3 = new FormData();
        datosForm3.append("id", evento.target.id);
        fetch("../dynamics/calendarioBorrar.php", {
            method:"POST", 
            body: datosForm3,
        }).then ((response) =>{
            return response.json();
        }).then ((datosJSON)=>{
            if(datosJSON.ok==false)
            {
                alert("Algo ha salido mal");
            }
            else{
              window.location="./calendario.html"   
            }
            
            
        });

    }
});
btn_agregar.addEventListener("click", ()=>{
    form.style.display="block";
    form.style.background="white";
   
})
para.addEventListener("change", ()=>{
   if(para.value == 4)
   {
       grupol.style.display="inline";
       seccionl.style.display="inline";
       
       
   }
   else{
        grupol.style.display="none";
        seccionl.style.display="none";
   }
   if(para.value ==5)
   {
        gradol.style.display="inline";
    }
    else{
        gradol.style.display="none";
    }
});

btn_enviar.addEventListener("click", (evento)=>
{
   evento.preventDefault();
    let datosForm2 = new FormData(datos);
   
    fetch("../dynamics/calendarioCrear.php", {
        method:"POST", 
        body: datosForm2,
    }).then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
        if(datosJSON.ok==false)
        {
            alert(datosJSON.texto);
        }
        else{
         window.location="./calendario.html"   
       
        }
        
        
    });

});
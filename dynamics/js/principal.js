// const h1nombre = document.getElementById("bienvenida"); 
// const btn_prueba = document.getElementById("prueba"); 
const aCalendario =document.getElementById("calendario"); 
const fotos=document.getElementById("fotos"); 
const divCalendario = document.getElementById("x");
var calendarioAbierto=false;
const cuadroCalen = document.createElement("div");
calendario="<table border = '3' id='calendario' height = '2vh' width='3vw'><thead><th>D</th><th>L</th><th>M</th><th>Mi</th><th>J</th><th>V</th><th>S</th></thead>";
calendario=calendario+"<tbody><tr><td>1</td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr></tbody></table>";
cuadroCalen.innerHTML="<a>"+calendario+"</a><br/><br/><br/><br/><br/><a href='./calendario.html'><button id='amarillo'>Ver</button></a>";
var dias;

function peticion()
{
    dias = document.getElementsByTagName("td");
    datosForm=new FormData();
    fetch("../dynamics/calendario.php", {
        method:"POST", 
        body: datosForm,
    }).then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
    
        console.log(datosJSON);
        ultimo=datosJSON.ultimo;
        dia1=datosJSON.primero;
        mesAct=datosJSON.mes;
        año=datosJSON.año;
       
        var num = 1;
        var dia = dia1;
        console.log(dias);
        console.log(dias[0]);

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
          
        }
    })

}




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
    peticion();
                
}); 


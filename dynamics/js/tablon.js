const tablon= document.getElementById ("tablon");

fetch("../dynamics/tablero.php", {
    method:"POST", 
  }).then ((response) =>{
    return response.json();
  }).then ((datosJSON)=>{
    tablon.innerHTML="<div id='"+datosJSON.+"'>"
  });
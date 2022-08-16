//funciona con la db proyectoaula

window.addEventListener("load", (evento) =>{

    const btn = document.getElementById("iniciar"); 
    const terminar = document.getElementById("terminar"); 
    const contenedor = document.getElementById("contenedor"); 
    const correctas = document.getElementById("correctas"); 
    const tiempo = document.getElementById("tiempo"); 
    const pregunta = document.getElementById("pregunta"); 
    const imagenPregunta = document.getElementById("imagen"); 
    const btnR1 = document.getElementById("btn1"); 
    const btnR2 = document.getElementById("btn2"); 
    const btnR3 = document.getElementById("btn3"); 
    const header = document.getElementById("header"); 
    const botones = document.getElementById("botones"); 
    const divJuego = document.getElementById("juego"); 
    const divIniciar = document.getElementById("iniciar"); 

    var preguntita; //arreglo que recibe todas las preguntas
    var imagen; 
    var respuesta; 
    var totalPreguntas; //para conocer la cantidad en el arreglo
    var preguntasDesordenadas; 
    var respuestas; //desordenar respuesta
    var n; //utilizado en math.random 
    var correcta; 
    var i=0; 
    var puntaje=0; 
    var tiempoMaximo;
    var cont=0; 
    var tiempoRestante; 

    cookies= document.cookie;
    cookies = cookies.split(";");;
    var cookieArray = new Array();
    for (cookie of cookies)
    {
        
        if(cookie.includes("id_juego"))
        {
            elemento = cookie.split("=");
        }
    }
    juego = elemento[1]; 
    for (cookie of cookies)
    {
        
        if(cookie.includes("id_actividad"))
        {
            elemento = cookie.split("=");
        }
    }
    actividad=elemento[1];

    const datosForm = new FormData();
    datosForm.append("id_juego", juego); 
   
    fetch("../dynamics/trivia.php", { 
        method: "POST", 
        body: datosForm,
    })
        .then ((response) =>{
            return response.json();
    }).then ((datosJSON)=>{
            preguntita = datosJSON.pregunta; 
            imagen = datosJSON.ruta_imagen; 
            respuesta = datosJSON.respuesta; 
    });
    
    function actualizar(){ 
        correcta = respuesta[i][0].respuesta;  
        pregunta.innerHTML = ""; //borra los datos de la pregunta anterior 
        imagenPregunta.innerHTML = ""; 
        btnR1.innerHTML = ""; 
        btnR2.innerHTML = ""; 
        btnR3.innerHTML = ""; 

        pregunta.innerHTML += preguntita[i]; 

        imagenPregunta.innerHTML += '<img src="'+ imagen[i]+'" alt="imagen relacionada" srcset="" width="200px" height="100px">'; 

        function respuestaRandom(){
            totalPreguntas = preguntita.length; //para saber la cantidad de preguntas
            n = Math.floor(Math.random()*(totalPreguntas-1)+1);
            
            
            respuestas= [respuesta[i][0].respuesta, respuesta[i][1].respuesta, respuesta[i][2].respuesta]; 
            if(n%2==0)
                respuestas.sort(() => Math.random() - 0.5);
            
            else 
                respuestas.reverse(() => Math.random() - 0.5);
        }
        
        respuestaRandom(); 
        btnR1.innerHTML += respuestas[0]; 
        btnR2.innerHTML += respuestas[1] 
        btnR3.innerHTML += respuestas[2]; 
        
    }

    btn.addEventListener("click", (evento) =>{
        botones.style.display = "block";
        correcta = respuesta[i][0].respuesta; 

        if(i==0)
        {
            divIniciar.style.display = "none"; 
        }

        actualizar(); 
       
        n++; 

        cont =0;
        tiempoMaximo=15; 
        tiempoRestante = setInterval(function()
        {
            tiempo.innerHTML = 'Tiempo restante: ' +(tiempoMaximo-cont) + ' sec';
            cont++;
            if(cont==15)
            {
                correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
              
                if(i!=totalPreguntas-1)
                {
                    i++; 
                }
                else if(i==totalPreguntas-1)
                {
                    tiempo.style.display="none"; 
                    header.innerHTML = ""; 
                    header.innerHTML += "<h1>Juego terminado</h1>"; 
                    clearInterval(tiempoRestante); 
            
                    divJuego.style.display = "none"; 
                    correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
                    terminar.style.display = "block"; 
                } 
                cont=0; 
                tiempoMaximo=15; 
                actualizar(); 
            }
        }, 1000);


        botones.addEventListener("click", (evento) =>{
         
            cont =0;
            tiempoMaximo=15; 
            if(i<totalPreguntas) 
            {
                
                // los || son por si al final de la respuesta se dejó algún espacio
                if((correcta == (evento.target.innerText+" ")) || correcta == (evento.target.innerText)  || correcta == (evento.target.innerText+"  ")) 
                    puntaje++; 
                else 
                    alert("Respuesta correcta=> " + correcta); 
        
                correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
                i++; 
                if(i==totalPreguntas)
                {
                    tiempo.style.display="none"; 
                    header.innerHTML = ""; 
                    header.innerHTML += "<h1>Juego terminado</h1>"; 
                    clearInterval(tiempoRestante); 
            
                    divJuego.style.display = "none"; 
                    correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
                    terminar.style.display = "block"; 
                }
                else{
                      actualizar(); //tiene que ir al final 
                }
              
            }
          
        });
    }); 
 

    terminar.addEventListener("click", (evento)=>
    {
       
        evento.preventDefault();
        console.log(juego);
        const datosForm2 = new FormData();
        puntaje=(puntaje/totalPreguntas)*10;
        // datosForm2.append("id_juego", juego); 
        datosForm2.append("id_actividad", actividad); 
        datosForm2.append("puntaje", puntaje); 
        fetch("../dynamics/puntaje.php", {
            method:"POST", 
            body: datosForm2,
          }).then ((response) =>{
            return response.json();
          }).then ((datosJSON)=>{
            if(datosJSON)
            {
                window.location="./PagInicio.php";
            }
          });
          
    })
});

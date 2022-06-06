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

    fetch("../dynamics/trivia.php")
        .then ((response) =>{
            return response.json();
    }).then ((datosJSON)=>{
            console.log(datosJSON);
            preguntita = datosJSON.pregunta; 
            // console.log(datosJSON.pregunta[2]);
            // console.log(datosJSON.respuesta[2][0].respuesta); 
            // console.log(datosJSON, ruta_imagen[1]); 
            imagen = datosJSON.ruta_imagen; 
            respuesta = datosJSON.respuesta; 
    });
    
    function actualizar(){ 
        // console.log("actualizzar     " + i); 
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
            // verificador= [respuesta[i][0].verificador, respuesta[i][1].verificador, respuesta[i][2].verificador]; 
            
            if(n%2==0)
                respuestas.sort(() => Math.random() - 0.5);
            
            else 
                respuestas.reverse(() => Math.random() - 0.5);

            // console.log(verificador); 
        }
        
        respuestaRandom(); 
        btnR1.innerHTML += respuestas[0]; 
        btnR2.innerHTML += respuestas[1] 
        btnR3.innerHTML += respuestas[2]; 
        
    }

    btn.addEventListener("click", (evento) =>{
        botones.style.display = "block";
        correcta = respuesta[i][0].respuesta; 
        console.log(correcta); 

        if(i==0)
        {
            divIniciar.style.display = "none"; 
        }

        actualizar(); 
        // btnR1.innerHTML += respuesta[i][0].respuesta; 
        // btnR2.innerHTML += respuesta[i][1].respuesta; 
        // btnR3.innerHTML += respuesta[i][2].respuesta; 
       
        n++; 

        cont =0;
        tiempoMaximo=15; 
        tiempoRestante = setInterval(function()
        {
            tiempo.innerHTML = 'Tiempo restante: ' +(tiempoMaximo-cont) + ' sec';
            cont++;
            console.log(cont); 
            if(cont==15)
            {
                correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
                i++; 
                cont=0; 
                tiempoMaximo=15; 
                actualizar(); 
            }
        }, 1000);


        botones.addEventListener("click", (evento) =>{
            // // console.log("entre a contenedor"); 
            // boton1= evento.target.id; 
            // // console.log(boton1); 
            // console.log("inner   "+evento.target.innerText);
            // console.log("verificar   "+correcta); 
            // pantalla = evento.target.innerText;
            // verificar = correcta; 
            // console.log(pantalla); 
         
            cont =0;
            tiempoMaximo=15; 
            //se debe de dar click en otra respuesta, porque sino el juego no termina
            if(i<totalPreguntas) //el error está aquí, porque  hace otra consulta a los datos, pero si le pongo totalPreguntas-1 no registra si la última pregunta tiene respuesta correcta
            {
                // los || son por si al final de la respuesta se dejó algún espacio
                if((correcta == (evento.target.innerText+" ")) || correcta == (evento.target.innerText)  || correcta == (evento.target.innerText+"  ")) 
                {
                    console.log("respuesta correcta    "+correcta); 
                   
                    puntaje++; 
                  
                }
                else
                {
                    console.log("incorrecta");
                    alert("Respuesta correcta=> " + correcta); 
                } 
                correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
                i++; 
                actualizar(); //tiene que ir al final 
            }
            else 
            {
                tiempo.style.display="none"; 
                header.innerHTML = ""; 
                header.innerHTML += "<h1>Juego terminado</h1>"; 
                clearInterval(tiempoRestante); 
                console.log(i); 
                divJuego.style.display = "none"; 
                correctas.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
                terminar.style.display = "block"; 
            }
            // console.log(btnR1.innerText); 
            // console.log(btnR2.innerText); 
            // console.log(btnR3.innerText); 
          
        });
    }); 
 

}); 

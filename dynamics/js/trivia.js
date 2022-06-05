window.addEventListener("load", (evento) =>{
    const btn = document.getElementById("prueba"); 
    const contenedor = document.getElementById("contenedor"); 
    const tiempo = document.getElementById("tiempo"); 
    const pregunta = document.getElementById("pregunta"); 
    const imagenPregunta = document.getElementById("imagen"); 
    const btnR1 = document.getElementById("btn1"); 
    const btnR2 = document.getElementById("btn2"); 
    const btnR3 = document.getElementById("btn3"); 
    const header = document.getElementById("header"); 
    const botones = document.getElementById("botones"); 

    var preguntita; 
    var imagen; 
    var respuesta; 
    var totalPreguntas; 
    var preguntasDesordenadas; 
    var respuestas; //desordenar respuesta
    var n; 
    var correcta; 
    var i=0; 
    var puntaje=0; 
    fetch("../dynamics/trivia.php")
        .then ((response) =>{
            return response.json();
    }).then ((datosJSON)=>{
            console.log(datosJSON);
            // nomClase.innerHTML=datosJSON.nombreMateria;
            // anuncios();
            preguntita = datosJSON.pregunta; 
            console.log(datosJSON.pregunta[2]);
            console.log(datosJSON.respuesta[2][0].respuesta); 
            // console.log(datosJSON, ruta_imagen[1]); 
            imagen = datosJSON.ruta_imagen; 
            respuesta = datosJSON.respuesta; 
    });

   
    var cont=0; 
    
    function actualizar(){ 
       
        console.log("actualizzar     " + i); 
        correcta = respuesta[i][0].respuesta; 

        pregunta.innerHTML = ""; 
        imagenPregunta.innerHTML = ""; 
        btnR1.innerHTML = ""; 
        btnR2.innerHTML = ""; 
        btnR3.innerHTML = ""; 

        // cont =0;
        // let tiempoRestante; 
        // let tiempoMaximo=15; 
        // tiempoRestante = setInterval(function(){
        //     tiempo.innerHTML = 'Tiempo restante: ' +(tiempoMaximo-cont) + ' sec';
        //     cont++;
        // }, 1000);

        pregunta.innerHTML += preguntita[i]; 

        imagenPregunta.innerHTML += '<img src="'+ imagen[i]+'" alt="imagen relacionada" srcset="" width="30%" height="20%">'; 

        function respuestaRandom(){
            totalPreguntas = preguntita.length; //para saber la cantidad de preguntas
            n = Math.floor(Math.random()*(totalPreguntas-1)+1);
            
            
            respuestas= [respuesta[i][0].respuesta, respuesta[i][1].respuesta, respuesta[i][2].respuesta]; 
            verificador= [respuesta[i][0].verificador, respuesta[i][1].verificador, respuesta[i][2].verificador]; 
            
            if(n%2==0)
            {
                respuestas.sort(() => Math.random() - 0.5);
            }
            else 
            {
                respuestas.reverse(() => Math.random() - 0.5);
            }

            // console.log(verificador); 
        }
        
        respuestaRandom(); 
        btnR1.innerHTML += respuestas[0]; 
        btnR2.innerHTML += respuestas[1] 
        btnR3.innerHTML += respuestas[2]; 
    }

    btn.addEventListener("click", (evento) =>{
       
        correcta = respuesta[i][0].respuesta; 
        console.log(correcta); 

        if(i==0)
            header.innerHTML += '<label>Ya iniciaste</label>'; 

        actualizar(); 
        // btnR1.innerHTML += respuesta[i][0].respuesta; 
        // btnR2.innerHTML += respuesta[i][1].respuesta; 
        // btnR3.innerHTML += respuesta[i][2].respuesta; 
       
        n++; 

        botones.addEventListener("click", (evento) =>{
            // console.log("entre a contenedor"); 
            boton1= evento.target.id; 
            // console.log(boton1); 
            console.log("inner   "+evento.target.innerText);
            console.log("verificar   "+correcta); 
            pantalla = evento.target.innerText;
            verificar = correcta; 
            console.log(pantalla); 
            if((correcta == (evento.target.innerText+" ")) || correcta == (evento.target.innerText)  || correcta == (evento.target.innerText+"  ")) 
            {
                console.log("res correcta    "+correcta); 
               
                puntaje++; 
             
                
            }
            else
            {
                console.log("incorrecta");
                alert("la respuesta correcta era: " + correcta); 
            } 
            tiempo.innerHTML = 'Puntos: ' + puntaje+ ' / ' + totalPreguntas;
            i++; 
            actualizar(); //tiene que ir al final 
            // console.log(btnR1.innerText); 
            // console.log(btnR2.innerText); 
            // console.log(btnR3.innerText); 
          
        });
    }); 
 

}); 

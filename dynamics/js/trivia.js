window.addEventListener("load", (evento) =>{
    const btn = document.getElementById("prueba"); 
    const contenedor = document.getElementById("contenedor"); 
    const pregunta = document.getElementById("pregunta"); 
    const imagenPregunta = document.getElementById("imagen"); 
    const btnR1 = document.getElementById("btn1"); 
    const btnR2 = document.getElementById("btn2"); 
    const btnR3 = document.getElementById("btn3"); 
    const header = document.getElementById("header"); 

    var preguntita; 
    var imagen; 
    var respuesta; 
    var totalPreguntas; 
    var preguntasDesordenadas; 
    var respuestas; //desordenar respuesta
    var n; 

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

    var i=0; 
    btn.addEventListener("click", (evento) =>{
        pregunta.innerHTML = ""; 
        imagenPregunta.innerHTML = ""; 
        btnR1.innerHTML = ""; 
        btnR2.innerHTML = ""; 
        btnR3.innerHTML = ""; 

        if(i==0)
            header.innerHTML += '<label>Ya iniciaste</label>'; 

        totalPreguntas = preguntita.length; //para saber la cantidad de preguntas
        // console.log(imagen); 

        
        // if(n%2==0)
        //     preguntasDesordenadas = preguntita.reverse(); 
        // else 
        //     preguntasDesordenadas = preguntita.sort(); 
        // console.log(n); 
        // console.log(preguntasDesordenadas); 
        pregunta.innerHTML += preguntita[i]; 

        imagenPregunta.innerHTML += '<img src="'+ imagen[i]+'" alt="imagen relacionada" srcset="" width="30%" height="20%">'; 

        function respuestaRandom(){
            n = Math.floor(Math.random()*(totalPreguntas-1)+1);
            respuestas= [respuesta[i][0].respuesta, respuesta[i][1].respuesta, respuesta[i][2].respuesta]; 
            console.log(n); 
            if(n%2==0)
                respuestas.sort(() => Math.random() - 0.5);
            else 
                respuestas.reverse(() => Math.random() - 0.5);
            console.log(respuestas); 
        }
        
        respuestaRandom(); 
        btnR1.innerHTML += respuestas[0]; 
        btnR2.innerHTML += respuestas[1] 
        btnR3.innerHTML += respuestas[2]; 

        // btnR1.innerHTML += respuesta[i][0].respuesta; 
        // btnR2.innerHTML += respuesta[i][1].respuesta; 
        // btnR3.innerHTML += respuesta[i][2].respuesta; 
        i++; 
        n++; 
    }); 
}); 

//funciona con la db proyectoaula

window.addEventListener("load", (evento) =>{
    const btn = document.getElementById("iniciar"); 
    const terminar = document.getElementById("terminar"); 
    const contenedor = document.getElementById("contenedor"); 
    const correctas = document.getElementById("correctas"); 
    const tiempo = document.getElementById("tiempo"); 
    const pregunta = document.getElementById("pregunta"); 
    const imagenPregunta = document.getElementById("imagen"); 
    const ahorcado = document.getElementById("ahorcado"); 
    const btnR2 = document.getElementById("btn2"); 
    const btnR3 = document.getElementById("btn3"); 
    const header = document.getElementById("header"); 
    const botones = document.getElementById("botones"); 
    const divJuego = document.getElementById("juego"); 
    const divIniciar = document.getElementById("iniciar"); 
    const teclado = document.getElementById("teclado"); 

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
    var respuestaVerificada= []; 
    var longitudRes; 
    var copiaRes; 
    var resGuiones= []; 

    fetch("../dynamics/ahorcado.php")
    .then ((response) =>{
        return response.json();
    }).then ((datosJSON)=>{
        console.log(datosJSON); 
        preguntita = datosJSON.pregunta; 
        imagen = datosJSON.ruta_imagen; 
        respuesta = datosJSON.respuesta; 

        var i=0; 
        
        totalPreguntas = (preguntita.length)-1; //para diferenciar los índices 
        prueba=datosJSON.respuesta[1].respuesta; 
        console.log("total preguntas: " + totalPreguntas); 
        
        for(i=0; i<=totalPreguntas; i++) //sirve para quitar los espacios
        {
            textoRespuesta =(datosJSON.respuesta[i].respuesta); 
            valor = datosJSON.respuesta[i].respuesta.length; 
            espacios=0; 
            console.log("respuesta:   " + textoRespuesta); 
            for(verificador=0; verificador<=totalPreguntas; verificador++)
            {
                
                ultimoValor = (datosJSON.respuesta[i].respuesta[valor-verificador]);
                if(ultimoValor== " ")
                {
                    espacios++; //contador de la cantidad de espacios); 
                }
            }
            console.log(espacios); 
            console.log(textoRespuesta.slice(0, (valor-espacios)).length); //localidades reales de la respuesta
            respuestaVerificada[i] = textoRespuesta.slice(0, (valor-espacios)); 
        }
        console.log(respuestaVerificada); 
    });

   
    function actualizar(){ 
        correcta = respuestaVerificada[i];  
        pregunta.innerHTML = ""; //borra los datos de la pregunta anterior 
        imagenPregunta.innerHTML = ""; 
        ahorcado.innerHTML = ""; 

        pregunta.innerHTML += preguntita[i]; 
        // console.log(preguntita); 
        imagenPregunta.innerHTML += '<img src="'+ imagen[i]+'" alt="imagen relacionada" srcset="" width="200px" height="100px">'; 

        totalPreguntas = preguntita.length; //para saber la cantidad de preguntas
        n = Math.floor(Math.random()*(totalPreguntas-1)+1);
        
        copiaRes = respuestaVerificada[i].toLowerCase();
        console.log("minus "+copiaRes);  
        longitudRes = respuestaVerificada[i].length; 

        var guiones; 
        for(guiones=0; guiones<longitudRes; guiones++)
        {
            ahorcado.innerHTML += "_ "; 
            resGuiones[guiones] = "_"; 
        }

        console.log(copiaRes.split()); 
        console.log(resGuiones); 
        

        ahorcado.innerHTML += respuestaVerificada[i];  
    }

    btn.addEventListener("click", (evento) =>{
        botones.style.display = "block";
        correcta = respuesta[i]; 

        if(i==0)
        {
            divIniciar.style.display = "none"; 
        }

        actualizar(); 
       
        n++; 

        cont =0;
        tiempoMaximo=20; 
        tiempoRestante = setInterval(function()
        {
            tiempo.innerHTML = 'Tiempo restante: ' +(tiempoMaximo-cont) + ' sec';
            cont++;
            if(cont==20)
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
                tiempoMaximo=20; 
                actualizar(); 
            }
        }, 1000);


        teclado.addEventListener("keyup", (evento) =>{
            console.log(evento.key); 
            if(evento.key == "a")
                console.log("es a"); 
            else 
                console.log("no es a"); 
        }); 

        botones.addEventListener("click", (evento) =>{
            console.log(evento.target.innerText); 
            cont =0;
            tiempoMaximo=20; 
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
 

}); 

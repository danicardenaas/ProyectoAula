<?php
    include("./config.php"); 
    $conexion = connect(); 

    $ID_juego=3; 


    $peticion= "SELECT ruta_imagen FROM juego WHERE ID_juego = '$ID_juego'"; 
    $query = mysqli_query($conexion, $peticion); 
    $fondo = mysqli_fetch_assoc($query); 


    $peticion= "SELECT * FROM preguntas WHERE ID_juego = '$ID_juego'"; 
    $query = mysqli_query($conexion, $peticion); 
    $preguntas = array ("pregunta"); 

    $imagenes= array ("ruta_imagen"); 
    $id = array (""); 

    $i=0; 
    while($row=mysqli_fetch_assoc($query))
    {
        $id[$i]=$row["ID_pregunta"]; //se guarda el id
        $preguntas[$i]=$row["pregunta"]; 
        $imagenes[$i]=$row["ruta_imagen"]; 
        $i++; 
    }

    //agregando las rutas de imagen 
    

    // var_dump($id); 
    $respuesta = array (); 
    for($i=0; $i<count($preguntas); $i++)
    {
        $peticion= "SELECT * FROM respuestas WHERE ID_pregunta = '$id[$i]'"; 
        $query = mysqli_query($conexion, $peticion); 
        $x =0; 
        while($row=mysqli_fetch_assoc($query))
        {
            
            $respuesta[$i][$x] =$row; //x es la respuesta
            
            // var_dump($respuesta[$i]); 
            $x=$x+1; 
            // echo $x; 
            // echo "<br><br>"; 
        }
        
    }
    
    $respuestas = array("pregunta"=>$preguntas, "ruta_imagen" => $imagenes, "respuesta"=>$respuesta, "fondo"=>$fondo); 
    // var_dump($respuesta); 
    echo json_encode($respuestas); 
    // var_dump($preguntas); 
?>
<?php

    include("./config.php"); 

    $conexion = connect(); 
    $preguntas= array ("pregunta");
    $num=2;
    for($i=0; $i<10; $i++)
    {
        $pregunta[$i]= (isset($_POST[$preguntas[$i]]) && $_POST[$preguntas[$i]] != "")? $_POST[$preguntas[$i]] : false; 
        var_dump($pregunta[$i]);
        echo "<br>";
        $preguntas[$i+1]="pregunta".$num;
        $num++;
    }
  
    // echo json_encode($respuesta);    
?>
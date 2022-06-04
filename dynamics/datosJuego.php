<?php

    include("./config.php"); 
     $cantidad = (isset($_POST['cantidad']) && $_POST["cantidad"] != "")? $_POST['cantidad'] : "no especifico";
    $conexion = connect(); 
    $preguntas= array ("pregunta");
    $num=2;
    for($i=0; $i<10; $i++)
    {
        $pregunta[$i]= (isset($_POST[$preguntas[$i]]) && $_POST[$preguntas[$i]] != "")? $_POST[$preguntas[$i]] : false; 
      if( $pregunta[$i]==false)
        {
            array_pop($pregunta);
            $i=11;
        }
        echo "<br>";
        $preguntas[$i+1]="pregunta".$num;
        $num++;
    }

    var_dump($pregunta);
    $resultados= array ("preguntas"=>$pregunta, "respuestas" => $respuestas)
    echo json_encode($resultado);    
?>
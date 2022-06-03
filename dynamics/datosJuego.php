<?php

    include("./config.php"); 

    $conexion = connect(); 

    for($i=1; $i<2; $i++)
    {
        $pregunta[$i] = [(isset($_POST['pregunta']) && $_POST["pregunta"] != "")? $_POST['pregunta'] : false]; 
        echo 'pregunta :  '.$pregunta; 
    }

    // echo json_encode($respuesta);    
?>
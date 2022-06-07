<?php

    include("./config.php"); //proyectoaula 
    $conexion = connect(); 
    $preguntas= array ("pregunta");
    // $res1 = array ("res1-"); 
    $respuestas = array(
        array ('res1-1', 'res2-1', 'res3-1'), 
        array ('res1-2', 'res2-2', 'res3-2'),
        array ('res1-3', 'res2-3', 'res3-3'),
        array ('res1-4', 'res2-4', 'res3-4'), 
        array ('res1-5', 'res2-5', 'res3-5'),
        array ('res1-6', 'res2-6', 'res3-6'),
        array ('res1-7', 'res2-7', 'res3-7'), 
        array ('res1-8', 'res2-8', 'res3-8'),
        array ('res1-9', 'res2-9', 'res3-9'),
        array ('res1-10', 'res2-10', 'res3-10'), 
    ); 
    $img1= array ("img1");
    $juego = "trivia1"; 
    $ID_juego=1; 
    $respre = array (
        array ("")
    ); 
    $res = array ("res1-", "res2-", "res3-");  
    $num=2;
    for($i=0; $i<10; $i++)
    {
        $pregunta[$i]= (isset($_POST[$preguntas[$i]]) && $_POST[$preguntas[$i]] != "")? $_POST[$preguntas[$i]] : false; 
        if( $pregunta[$i]==false)
        {
            array_pop($pregunta);
            $i=11;
        }
        else
        {
            $peticion = "INSERT INTO preguntas (pregunta, ID_juego) VALUES ('$pregunta[$i]', '$ID_juego')";
            $query = mysqli_query($conexion, $peticion); 
            $pk_pregunta=  mysqli_insert_id($conexion); //esta obteniendo el último id pregunta

            $imagen  = 'img'.($i+1); 
            echo "imagen".$imagen . ' <br>'; 
            echo "files <br> <br>".$_FILES[$imagen ]['tmp_name']; 
            if(isset($_FILES[$imagen ]) && $_FILES[$imagen ]['tmp_name'] != ""){
                $name=$_FILES[$imagen ]['name'];
        
                $ext=pathinfo($name,PATHINFO_EXTENSION);
                $ext=strtolower($ext);
                $ruta="../Imgs/juegos/$juego"."_"."$i.$ext";
                echo $ruta. '<br>'; 
                // $ext=strtolower($ext);
                if($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
                    $arch=$_FILES[$imagen]['tmp_name'];
                    echo "arch   ".$arch; 
                    rename($arch,$ruta);
                
       
                    echo "se actualizó"; 
                }
                else{
                    echo"$name.  No se puede subir";
                }
            }
            else 
            {
                echo "no entra"; 
                $ruta="../Imgs/juegos/predeterminada.$ext"; //predeterminada
            }
            $peticion = "UPDATE preguntas SET ruta_imagen ='$ruta' WHERE ID_pregunta=$pk_pregunta"; 
            $query = mysqli_query( $conexion, $peticion);
        }
        
        echo $pk_pregunta .'<br>';
        $preguntas[$i+1]="pregunta".$num;
        $num++;

        // $numres = array ("1", "2", "3"); 
        // for ($numres as $x)
        // {
        //     // $numres = $res[$i].($i+1); 
        //     $respuesta[$i] = (isset($_POST[$res[]$numres]) && $_POST[$numres] != "")? $_POST[$numres] : false; 
    
        // echo 'res1-'.($i+1).'<br>'; 
        // }
        
        // echo 'res1-'.($i+1).'<br>'; 
        if($i<=10)
        {
            $res1[$i] = (isset($_POST[$respuestas[$i][0]]) && $_POST[$respuestas[$i][0]] != "")? $_POST[$respuestas[$i][0]] : false; 
            $res2[$i] = (isset($_POST[$respuestas[$i][1]]) && $_POST[$respuestas[$i][1]] != "")? $_POST[$respuestas[$i][1]] : false; 
            $res3[$i] = (isset($_POST[$respuestas[$i][2]]) && $_POST[$respuestas[$i][2]] != "")? $_POST[$respuestas[$i][2]] : false; 
            

            // $respre[$i][0] = (isset($_POST[$respuestas[$i][0]]) && $_POST[$respuestas[$i][0]] != "")? $_POST[$respuestas[$i][0]] : false; 
            // $respre[$i][1] = (isset($_POST[$respuestas[$i][1]]) && $_POST[$respuestas[$i][1]] != "")? $_POST[$respuestas[$i][1]] : false; 
            // $respre[$i][2] = (isset($_POST[$respuestas[$i][2]]) && $_POST[$respuestas[$i][2]] != "")? $_POST[$respuestas[$i][2]] : false; 

            // INSERT INTO respuestas (ID_pregunta, verificador, respuesta) VALUES ("2", "1", "prueb2");
            $peticion = "INSERT INTO respuestas (ID_pregunta, verificador, respuesta) VALUES ('$pk_pregunta', '1', '$res1[$i] ')"; //esta es la respuesta correcta
            $query = mysqli_query($conexion, $peticion); 

            $peticion = "INSERT INTO respuestas (ID_pregunta, verificador, respuesta) VALUES ('$pk_pregunta', '0', '$res2[$i]')"; //verificador 0 
            $query = mysqli_query($conexion, $peticion); 

            $peticion = "INSERT INTO respuestas (ID_pregunta, verificador, respuesta) VALUES ('$pk_pregunta', '0', '$res3[$i] ')"; //verificador 0
            $query = mysqli_query($conexion, $peticion); 
            
        }

    }

    if(isset($_FILES['fondo']) && $_FILES['fondo']['tmp_name'] != ""){
        $name=$_FILES['fondo']['name'];

        $ext=pathinfo($name,PATHINFO_EXTENSION);
        $ext=strtolower($ext);
        $ruta="../Imgs/juegos/$juego"."_"."fondo.".$ext;
        echo $ruta. '<br>'; 
        // $ext=strtolower($ext);
        if($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
            $arch=$_FILES['fondo']['tmp_name'];
            echo "arch   ".$arch; 
            rename($arch,$ruta);
        

            echo "se actualizó"; 
        }
        else{
            echo"$name.  No se puede subir";
        }
    }
    else 
    {
        echo "no entra"; 
        $ruta="../Imgs/juegos/fondo.".$ext;
    }
    $peticion = "INSERT INTO juego (ruta_imagen) VALUES ('$ruta')"; 
    $query = mysqli_query( $conexion, $peticion);

    // $respuesta[0] = (isset($_POST['res1-1']) && $_POST['res1-1'] != "")? $_POST['res1-1'] : false; 
    // $respuesta[1] = (isset($_POST['res2-1']) && $_POST['res2-1'] != "")? $_POST['res2-1'] : false; 
    // $respuesta[2] = (isset($_POST['res3-1']) && $_POST['res3-1'] != "")? $_POST['res3-1'] : false; 


    // var_dump($respre); 
    echo '<br><br>'; 
    var_dump($pregunta);
    // $resultados= array ("preguntas"=>$pregunta, "respuestas" => $respuestas)
    // echo json_encode($resultado);    
?>
<?php
    include './config.php';
    include './funcionFecha.php';
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $tipoduda = (isset($_POST['tipoduda']) && $_POST['tipoduda'] != "")? $_POST['tipoduda'] : false;

    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    
    $conexion = connect();

    
    if(!$conexion)
    {
        echo "Fallo la conexión con la base de datos";
    }
    $user=$_SESSION["ID_usuario"];
    $pregunta = (isset($_POST['pregunta']) && $_POST["pregunta"] != "")? $_POST['pregunta'] : false;
    if($pregunta) {
       
        $fecha=fecha();
        if(isset($_FILES['arch']) && $_FILES['arch']['tmp_name'] != "" )
        { 
        $name=$_FILES['arch']['name'];
        $ext=pathinfo($name, PATHINFO_EXTENSION);
        $arch=$_FILES['arch']['tmp_name'];
        $archivo=$pregunta.$user.$mes.$dia.$año.".".$ext;

        $ruta= "../Imgs/imgforo/$archivo";
        rename($arch, $ruta);
        }
        else{
            $ruta="";
        }
        $peticion = "INSERT INTO duda (descripcion, fecha_pub, ruta_img,id_usuario, id_tipoduda) VALUES ('$pregunta','$fecha','$ruta', $user, $tipoduda )";
        $query = mysqli_query($conexion, $peticion);
        
        if($query)
        {
            $respuesta= array ("ok" => true, "texto" => "Listo")   ;
        }
        
    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    
    
   echo json_encode($respuesta);

    


?>
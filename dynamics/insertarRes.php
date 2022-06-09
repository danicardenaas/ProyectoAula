<?php
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();

    include './config.php';
    include './funcionFecha.php';
    $conexion = connect();
    if(!$conexion)
    {
        echo "Fallo la conexión con la base de datos";
    }
    $user=$_SESSION["ID_usuario"];
    $respuesta = (isset($_POST['respuesta']) && $_POST["respuesta"] != "")? $_POST['respuesta'] : false;
    $id_pregunta = (isset($_POST['id_pregunta']) && $_POST["id_pregunta"] != "")? $_POST['id_pregunta'] : false;
    if($respuesta) {
       
        $fecha=fecha();
        if(isset($_FILES['arch']) && $_FILES['arch']['tmp_name'] != "" )
        { 
        $name=$_FILES['arch']['name'];
        $ext=pathinfo($name, PATHINFO_EXTENSION);
        $arch=$_FILES['arch']['tmp_name'];
        $archivo=$respuesta.$id_pregunta.$user.$mes.$dia.$año.".".$ext;

        $ruta= "../Imgs/imgforo/$archivo";
        rename($arch, $ruta);
        }
        else{
            $ruta="";
        }
        $peticion = "INSERT INTO dudaresp (descripcion, fecha_pub, ruta_img,id_usuario, id_duda) VALUES ('$respuesta','$fecha','$ruta', $user,$id_pregunta )";
        $query = mysqli_query($conexion, $peticion);
        if($query)
        {
            $respuesta= array ("ok" => true, "texto" => "Listo")   ;
        }
        $respuesta= array ("ok" => true, "texto" => $id_pregunta)   ;
        
    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    
    
   echo json_encode($respuesta);

    


?>
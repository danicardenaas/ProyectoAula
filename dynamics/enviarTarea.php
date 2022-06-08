<?php
    //Insersión de datos en la base de la entrega de una actividad
    include("./config.php"); 
    include("./funcionFecha.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    $conexion= connect();
    session_start();
    $id_actividad = (isset($_POST['id_actividad']) && $_POST["id_actividad"] != "")? $_POST['id_actividad'] : false;
    $id_usuario= $_SESSION["ID_usuario"];
    $canArch= (isset($_POST['CanArch']) && $_POST["CanArch"] != "")? $_POST['CanArch'] : false;
    $arch1= (isset($_POST['arch1']) && $_POST["arch1"] != "")? $_POST['arch1'] : false;
    $comment= (isset($_POST['coment']) && $_POST["coment"] != "")? $_POST['coment'] : false;
    $fecha=fecha();
    
    if($comment)
    {
        $peticion = "INSERT INTO act_entrega (ID_actividad, ID_usuario,fecha_entr, coment_alumno) VALUES ('$id_actividad', '$id_usuario', '$fecha','$comment')";
    }
    else{
        $peticion = "INSERT INTO act_entrega (ID_actividad, ID_usuario,fecha_entr) VALUES ('$id_actividad', '$id_usuario', '$fecha')";
    }
    $query = mysqli_query( $conexion, $peticion ); 
    $id_entrega = mysqli_insert_id($conexion);
  
         for($i=0;$i<$canArch;$i++)
        {
            $archivoNum="arch".$i+1;
            if(isset($_FILES[$archivoNum]) && $_FILES[$archivoNum]['tmp_name'] != ""){
                $name=$_FILES[$archivoNum]['name'];
                $arch=$_FILES[$archivoNum]['tmp_name'];
                $ext=pathinfo($name,PATHINFO_EXTENSION);
                $nombre=pathinfo($name,PATHINFO_FILENAME);
                $ruta="../Imgs/tareas/$nombre"."_".$id_usuario."_"."$id_actividad.$ext";    
                
                rename($arch,$ruta); 
                $peticion = "INSERT INTO archivos_entrega (ruta, ID_act_entrega,ID_tipoArch) VALUES ('$ruta', '$id_entrega', 2) ";
                $query = mysqli_query( $conexion, $peticion ); 
            }   
            
        }
  
    
    // $peticion = "INSERT INTO archivos_entrega (ruta, ID_entrega,ID_tipoArch) VALUES ('$ruta', '$id_entrega', 2) ";
    // $query = mysqli_query( $conexion, $peticion ); 
    echo json_encode($query);
?>
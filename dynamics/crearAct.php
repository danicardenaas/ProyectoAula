<?php

    include("./config.php"); 
    include("./funcionFecha.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    $conexion = connect(); 
    $id_usuario=$_SESSION["ID_usuario"];
    
    $id_materia=(isset($_POST['id_materia']) && $_POST["id_materia"] != "")? $_POST['id_materia'] : false;

    $tema= (isset($_POST['tema']) && $_POST["tema"] != "")? $_POST['tema'] : false;
    $puntaje= (isset($_POST['puntaje']) && $_POST["puntaje"] != "")? $_POST['puntaje'] : false;
    $hora= (isset($_POST['hora']) && $_POST["hora"] != "")? $_POST['hora'] : false;
    $fecha= (isset($_POST['fecha']) && $_POST["fecha"] != "")? $_POST['fecha'] : false;
    $indicaciones= (isset($_POST['indicaciones']) && $_POST["indicaciones"] != "")? $_POST['indicaciones'] : false;
    $formatoEntrega= (isset($_POST['formatoEntrega']) && $_POST["formatoEntrega"] != "")? $_POST['formatoEntrega'] : false;
    $titulo= (isset($_POST['titulo']) && $_POST["titulo"] != "")? $_POST['titulo'] : false;
    $rubricatxt= (isset($_POST['rubricatxt']) && $_POST["rubricatxt"] != "")? $_POST['rubricatxt'] : false;
    
    $linkC= (isset($_POST['linkC']) && $_POST["linkC"] != "")? $_POST['linkC'] : false;
    $archC= (isset($_POST['archC']) && $_POST["archC"] != "")? $_POST['archC'] : false;
    $link= (isset($_POST['link1']) && $_POST["link1"] != "")? $_POST['link1'] : false;
    $arch= (isset($_POST['arch1']) && $_POST["arch1"] != "")? $_POST['arch1'] : false;
    $fecha = $fecha." ".$hora;
    //id_materia
    if($tema && $puntaje && $hora && $fecha && $indicaciones && $formatoEntrega && $titulo)
    {
        //SACAR FECHA
        $fecha2=fecha();
        if($rubricatxt && !(isset($_FILES["rubricaArch"]) && $_FILES["rubricaArch"]['tmp_name'] != "") )
        {
            
            $peticion = "INSERT INTO actividad (tema, nombre, indicaciones, puntaje, fecha_pub, id_materia, id_entrega, rubrica, fecha_limite)
            VALUES ('$tema', '$titulo' , '$indicaciones', '$puntaje' , '$fecha2', '$id_materia' , 1 , '$rubricatxt', '$fecha') ";
        }
         
        else if(isset($_FILES["rubricaArch"]) && $_FILES["rubricaArch"]['tmp_name'] != ""  ){
            $name=$_FILES["rubricaArch"]['name'];
            $ext=pathinfo($name,PATHINFO_EXTENSION);
            $ext=strtolower($ext);
           
            // $ext=strtolower($ext);
            $arch=$_FILES['rubricaArch']['tmp_name'];
            if($ext=="png" || $ext=="jpg" || $ext=="jpeg"){
                $arch=$_FILES["rubricaArch"]['tmp_name'];
              
                $ruta="../Imgs/actividad/rubrica/$titulo"."_"."rubrica.".$ext;
                rename($arch,$ruta);
            }
            else{
                $respuesta= array ("ok" => false, "texto" => "La rúbrica debe ser una imagen")   ;
            }
            
           
            if(!$rubricatxt)
            {
                 $peticion = "INSERT INTO actividad (tema, nombre, indicaciones, puntaje, fecha_pub, id_materia, id_entrega, ruta,fecha_limite)
            VALUES ('$tema', '$titulo', '$indicaciones',$puntaje, '$fecha2', $id_materia, 1, '$ruta', '$fecha') ";
            }
            else{
                $peticion = "INSERT INTO actividad (tema, nombre, indicaciones, puntaje, fecha_pub, id_materia, id_entrega, ruta_rubrica, rubrica, fecha_limite)
                VALUES ('$tema', '$titulo', '$indicaciones',$puntaje, '$fecha2', $id_materia, 1, '$ruta','$rubricatxt', '$fecha') ";
            }
           
        }
        else{
            $peticion = "INSERT INTO actividad (tema, nombre, indicaciones, puntaje, fecha_pub, id_materia, id_entrega,fecha_limite)
            VALUES ('$tema', '$titulo', '$indicaciones',$puntaje, '$fecha2', $id_materia, 1,  '$fecha') ";
        }
        
        
        $query = mysqli_query( $conexion, $peticion ); 
        $id_act=  mysqli_insert_id($conexion);
        $desEvento="Entrega de: ".$titulo." Programada para: ". $fecha;
       //INSERTAR ARCHIVOS(RUTAS  y links) a la tabla de archivos
       //links
       if($link)
       {
            for($i=0;$i<$linkC;$i++)
            {
                $nombre = "link".$i+1;
                $linkin= (isset($_POST[$nombre]) && $_POST[$nombre] != "")? $_POST[$nombre] : false;
                $peticion = "INSERT INTO archivos (ruta, ID_actividad,ID_tipoArch) VALUES ('$linkin', '$id_act', 1) ";
                $query = mysqli_query( $conexion, $peticion ); 
            }
       }
        
        //archivos
        if($arch)
        {
            for($i=0;$i<$archC;$i++)
            {
                $archivoNum="arch".$i+1;
                if(isset($_FILES[$archivoNum]) && $_FILES[$archivoNum]['tmp_name'] != ""){
                    $name=$_FILES[$archivoNum]['name'];
                    $arch=$_FILES[$archivoNum]['tmp_name'];
                    $ext=pathinfo($name,PATHINFO_EXTENSION);
                    $ruta="../Imgs/actividad/material/$titulo"."_"."$tema.$ext";      
                    rename($arch,$ruta); 
                    $peticion = "INSERT INTO archivos (ruta, ID_actividad,ID_tipoArch) VALUES ('$ruta', '$id_act', 2) ";
                    $query = mysqli_query( $conexion, $peticion ); 
                }   
                
            }
        }
    
        if($query)
        {
           $respuesta= array ("ok" => true, "texto" => "Listo")   ; 
        }
     
        $fechaEv = explode(" ", $fecha);
        $fechaEv = $fechaEv[0];
        $peticion = "SELECT * FROM materia WHERE id_materia = $id_materia";
        $query = mysqli_query( $conexion, $peticion ); 
        $row = mysqli_fetch_assoc($query);
        $nomMat=$row["nombreMateria"];
        $desEvento = $desEvento." de tu clase: ".$nomMat;
       
        //insertar el evento para los alumnos
        $peticion = "INSERT INTO evento (ID_tipoevento, fecha, descripcion, ruta_imagen ) VALUES (2, '$fechaEv', '$desEvento', '') ";
        $query = mysqli_query( $conexion, $peticion ); 
        $ID_evento = mysqli_insert_id($conexion);
        $peticion = "SELECT * FROM uhm  WHERE id_materia= $id_materia";
        $query = mysqli_query( $conexion, $peticion ); 
  
        while($row = mysqli_fetch_assoc($query)){
            $usuarioInt=$row["ID_usuario"];            
            $peticion = "INSERT INTO usuariohasevento (ID_evento, id_usuario) VALUES ($ID_evento, $usuarioInt)";
            $query2 = mysqli_query( $conexion, $peticion );
        }
        

    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    
    
   echo json_encode($respuesta);

    
?>
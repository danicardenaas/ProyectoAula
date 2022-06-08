<?php
    include("./config.php"); 
    include("./funcionFecha.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_usuario=$_SESSION["ID_usuario"];
    $fecha = fecha();

    $tema = (isset($_POST['tema']) && $_POST["tema"] != "")? $_POST['tema'] :false;
    $unidad = (isset($_POST['unidad']) && $_POST["unidad"] != "")? $_POST['unidad'] : false;
    $tipo = (isset($_POST['tipo']) && $_POST["tipo"] != "")? $_POST['tipo'] :false;
    $materia = (isset($_POST['materia']) && $_POST["materia"] != "")? $_POST['materia'] :false;
    $arch1 = (isset($_POST['arch1']) && $_POST["arch1"] != "")? $_POST['arch1'] :false;
    $descripcion = (isset($_POST['descripcion']) && $_POST["descripcion"] != "")? $_POST['descripcion'] :false;
    $cantArch = (isset($_POST['cantArch']) && $_POST["cantArch"] != "")? $_POST['cantArch'] :false;

    if( $descripcion && $tema && $unidad && $tipo && $materia && $cantArch)
    {
        $peticion = "INSERT INTO material (ID_usuario, likes, ID_tipoMaterial, Id_clasificacion, descripcion, tema, unidad, fecha, reportado)
        VALUES ($id_usuario, 0, $tipo, $materia, '$descripcion', '$tema', $unidad, '$fecha', 0)";
        $query = mysqli_query( $conexion, $peticion); 
        $id_material=mysqli_insert_id($conexion);

        for($i=0;$i<$cantArch;$i++)
        {
            $archivoNum="arch".$i+1;
            if(isset($_FILES[$archivoNum]) && $_FILES[$archivoNum]['tmp_name'] != ""){
                $name=$_FILES[$archivoNum]['name'];
                $arch=$_FILES[$archivoNum]['tmp_name'];
                $ext=pathinfo($name,PATHINFO_EXTENSION);
                $ruta="../Imgs/tablon/_".$id_usuario.$materia."_"."$tema.$ext";      
                rename($arch,$ruta); 
                $peticion = "INSERT INTO archivosTablon (ruta, ID_material) VALUES ('$ruta', '$id_material') ";
                $query = mysqli_query( $conexion, $peticion ); 
            }   
            $respuesta=array("ok" => $query, "texto" =>"Listo");
        } 
    }
    else{
        $respuesta=array("ok" => false, "texto" =>"Llena toda la información");
    }
   
    
   
    echo json_encode($respuesta);
  
?>
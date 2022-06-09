<?php
    include("./config.php"); 
    include("./funcionFecha.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $fecha=fecha();
    $conexion = connect(); 
   
    $id_resp = (isset($_POST['id_resp']) && $_POST["id_resp"] != "")? $_POST['id_resp'] : false;
    $id_preg = (isset($_POST['id_preg']) && $_POST["id_preg"] != "")? $_POST['id_preg'] : false;
    $content = (isset($_POST['content']) && $_POST["content"] != "")? $_POST['content'] : false;

    $modificar = (isset($_POST['modificar']) && $_POST["modificar"] != "")? $_POST['modificar'] : false;
 
    if($modificar ==1)
   { 
       $peticion = "UPDATE duda SET descripcion = '$content', fecha_pub='$fecha' WHERE id_duda=$id_preg";
   }
  else
   {
     $peticion = "UPDATE dudaresp SET descripcion = '$content', fecha_pub= '$fecha' WHERE id_dudaresp=$id_resp";
   }
   $query = mysqli_query( $conexion, $peticion); 

   echo json_encode($query);
?>
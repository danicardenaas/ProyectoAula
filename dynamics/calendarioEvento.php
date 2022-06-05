<?php
   include("./config.php"); 
   session_name("SesionUsuario");
   session_id("123456789");
   $conexion= connect();
   session_start();
   if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
   {
       $nuevaURL='./inicio.php';
       header('Location: '.$nuevaURL);
   }
   $fecha = (isset($_POST['fecha']) && $_POST["fecha"] != "")? $_POST['fecha'] : false;
   $id_usuario= $_SESSION["ID_usuario"];
   $peticion = "SELECT * FROM usuariohasevento NATURAL JOIN evento WHERE id_usuario = $id_usuario";
   $query = mysqli_query( $conexion, $peticion); 
   $i=0;
   $eventos=["no"];
   while($datos=mysqli_fetch_assoc($query))
   {
        $id_evento= $datos["ID_evento"];
        $peticion = "SELECT * FROM evento WHERE id_evento = $id_evento AND fecha= '$fecha' ";
        $query2 = mysqli_query( $conexion, $peticion); 
        while($datos2=mysqli_fetch_assoc($query2))
        {
            $eventos[$i]=$datos2;
            $i++;
        }
   }
 
   $respuesta=array("eventos" => $eventos);
   echo json_encode($respuesta);
?>
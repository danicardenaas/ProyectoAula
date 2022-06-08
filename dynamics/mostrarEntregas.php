<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
  
    $id_actividad = (isset($_POST['id_actividad']) && $_POST["id_actividad"] != "")? $_POST['id_actividad'] : false;
    $id_entrega = (isset($_POST['id_entrega']) && $_POST["id_entrega"] != "")? $_POST['id_entrega'] : false;
  
   if($id_actividad)
   {
        $peticion = "SELECT * FROM act_entrega NATURAL JOIN usuario  WHERE id_actividad = $id_actividad ";
   }    
   else if($id_entrega)
   {
        $peticion = "SELECT * FROM act_entrega NATURAL JOIN archivos_entrega  WHERE id_act_entrega = $id_entrega";   

   }
    $query = mysqli_query( $conexion, $peticion); 
   $i=0;
        $respuesta=array();
        while( $datos=mysqli_fetch_array($query, MYSQLI_ASSOC))
        {
                $respuesta[$i]=$datos;
                $i++;
        }
    echo json_encode($respuesta);
?>
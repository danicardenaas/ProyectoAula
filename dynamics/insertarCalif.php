<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
  
    $calif = (isset($_POST['calif']) && $_POST["calif"] != "")? $_POST['calif'] :0;
    $coment = (isset($_POST['coment']) && $_POST["coment"] != "")? $_POST['coment'] : "No especifico";
    $id_entrega = (isset($_POST['id_entrega']) && $_POST["id_entrega"] != "")? $_POST['id_entrega'] :"No especifico";

    var_dump($coment);
    var_dump($id_entrega);
    var_dump($calif);
    $peticion = "UPDATE act_entrega SET calif=$calif , coment_profe='$coment' WHERE id_act_entrega = $id_entrega";   
    $query = mysqli_query( $conexion, $peticion); 
  
    echo json_encode(  $query);
?>
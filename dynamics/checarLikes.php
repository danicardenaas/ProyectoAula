<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_usuario=$_SESSION["ID_usuario"];

    $material = (isset($_POST['material']) && $_POST["material"] != "")? $_POST['material']:false;
  
    $peticion = "SELECT * FROM ULikesMaterial WHERE ID_usuario=$id_usuario AND ID_material= $material";
    
    $query = mysqli_query($conexion, $peticion);
    $datos=mysqli_fetch_assoc($query);
    if($datos==null)
    {
        $datos="no";
    }
    echo json_encode($datos);
?>
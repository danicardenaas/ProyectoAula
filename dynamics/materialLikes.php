<?php
    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $id_usuario=$_SESSION["ID_usuario"];
    $likes = (isset($_POST['likes']) && $_POST["likes"] != "")? $_POST['likes']:0;
    $material = (isset($_POST['material']) && $_POST["material"] != "")? $_POST['material']:0;
    $peticion = "SELECT * FROM material WHERE ID_material = $material";   
    $query = mysqli_query( $conexion, $peticion);
    $datos=mysqli_fetch_assoc($query);
    $likesBD=$datos["Likes"];
    $total=$likesBD+$likes;

    $peticion = "UPDATE material SET likes=$total  WHERE ID_material = $material";   
    $query = mysqli_query( $conexion, $peticion); 
    if($likes>0)
    {
        $peticion = "INSERT INTO  ULikesMaterial(ID_usuario, ID_material) VALUES ($id_usuario, $material)"; 
        $query = mysqli_query($conexion, $peticion);
    }
    if($likes<0)
    {
        $peticion = "DELETE FROM ULikesMaterial WHERE ID_usuario=$id_usuario AND ID_material= $material";
        $query = mysqli_query($conexion, $peticion); 
    }

    
    
    echo json_encode($total);
?>
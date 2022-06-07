<?php
    include "./config.php"; 

    $conexion = connect(); 
    $id_materia= (isset($_POST['id_materia']) && $_POST["id_materia"] != "")? $_POST['id_materia'] : false;
    $peticion = "SELECT * FROM materia WHERE id_materia= $id_materia";
    $query = mysqli_query($conexion, $peticion);
    $resultados=mysqli_fetch_assoc ($query);
    echo json_encode($resultados);
?>
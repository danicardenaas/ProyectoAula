<?php
    include "./config.php"; 

    $conexion = connect(); 
    $materia= (isset($_POST['materia']) && $_POST["materia"] != "")? $_POST['materia'] : false;
    $peticion = "SELECT * FROM materia WHERE id_materia= $materia";
    $query = mysqli_query($conexion, $peticion);
    $resultados=mysqli_fetch_assoc ($query);
    echo json_encode($resultados);
?>
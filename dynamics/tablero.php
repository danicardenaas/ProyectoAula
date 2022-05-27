<?php
        include './config.php';
        $conexion = connect();
        
        
        if(!$conexion)
        {
            echo "Fallo la conexión con la base de datos";
        }
        $peticion = 'SELECT * FROM materia';
        $query = mysqli_query($conexion, $peticion);
        $i=0;
        while($row=mysqli_fetch_assoc($query))
        {
          $resultados[$i] = $row;
          $i++;
        }
        echo json_encode($resultados);

?>
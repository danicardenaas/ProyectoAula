<?php
        session_name("SesionUsuario");
        session_id("123456789");
        session_start();
        if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
        {
            $nuevaURL='./inicio.php';
            header('Location: '.$nuevaURL);
        }
        include './config.php';
        $conexion = connect();
        $resultados= ["no"];
        
        if(!$conexion)
        {
            echo "Fallo la conexión con la base de datos";
        }
        $user=$_SESSION["ID_usuario"];



        $peticion = "SELECT * FROM uhm  LEFT JOIN materia ON uhm.ID_materia = materia.ID_MATERIA WHERE id_usuario=$user";
        $query = mysqli_query($conexion, $peticion);
        $i=0;
        
        
       
        if($query!= false)
        {
          while($row=mysqli_fetch_assoc($query))
          {
            $resultados[$i] = $row;
            $i++;
          }   
        }
        
        echo json_encode($resultados);
        

?>
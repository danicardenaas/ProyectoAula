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


        //Materias para su grupo add
        // $peticion = "SELECT * FROM uhg WHERE usuario = '$user'";
        // $query = mysqli_query($conexion, $peticion);
        // $data = mysqli_fetch_assoc($query);
        // $grupo= $data ['ID_grupo'];
        // $peticion = "SELECT * FROM materia NATURAL JOIN ghm NATURAL JOIN grupo WHERE grupo='$grupo' AND (seccion='$seccion' OR seccion=NULL)";
        // $query = mysqli_query($conexion, $peticion);
        // while ($row=mysqli_fetch_assoc($query))
        // {
            
        //      $id_materia=$row['ID_materia'];
        //       $peticion = "INSERT INTO UHM (ID_usuario, ID_materia) VALUES ($user, $id_materia)";
        //       $res = mysqli_query($conexion, $peticion);
        // }

        $peticion = "SELECT * FROM uhm  LEFT JOIN materia ON uhm.ID_materia = materia.ID_MATERIA WHERE id_usuario=$user";
        $query = mysqli_query($conexion, $peticion);
        $i=0;
        
        
        // if($query!=false)
        // {
        //     while($row = mysqli_fetch_assoc($query)){
        
        //     $id_materia=$row['ID_materia'];
        //     $peticion = "INSERT INTO UHM (ID_usuario, ID_materia) VALUES ($id_usuario, $id_materia)";
        //     $res = mysqli_query($conexion, $peticion);
        //     }
        // }
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
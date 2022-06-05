<?php

    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    if(!isset($_SESSION["nombre"]) && $_SESSION["nombre"]==false)
    {
        $nuevaURL='./inicio.php';
        header('Location: '.$nuevaURL);
    }
    $conexion = connect(); 
    $id_usuario=$_SESSION["ID_usuario"];
    
    $fecha= (isset($_POST['fecha']) && $_POST["fecha"] != "")? $_POST['fecha'] : false;
       
    $descripcion= (isset($_POST['descripcion']) && $_POST["descripcion"] != "")? $_POST['descripcion'] : false;    
    $para= (isset($_POST['para']) && $_POST["para"] != "")? $_POST['para'] : false;    
    $grupo= (isset($_POST['grupo']) && $_POST["grupo"] != "")? $_POST['grupo'] : false;   
    $seccion= (isset($_POST['seccion']) && $_POST["seccion"] != "")? $_POST['seccion'] : false;    
    $grado= (isset($_POST['grado']) && $_POST["grado"] != "")? $_POST['grado'] : false;
    $tipo= (isset($_POST['tipo']) && $_POST["tipo"] != "")? $_POST['tipo'] : false;
    if($fecha && $descripcion && $para && $tipo)
    {
       

            if(isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name'] != "" )
            { 
                $name=$_FILES['imagen']['name'];
                $ext=pathinfo($name, PATHINFO_EXTENSION);
                $arch=$_FILES['imagen']['tmp_name'];
                $archivo=$descripcion.$fecha.".".$ext;

                $ruta= "../Imgs/eventos/$archivo";
                rename($arch, $ruta);
            }
            else{
                $ruta="";
            }
          
            $peticion = "INSERT INTO evento (id_tipoevento, fecha, descripcion, ruta_imagen) VALUES ('$tipo','$fecha', '$descripcion', '$ruta')";
            $query = mysqli_query($conexion, $peticion); 
            $id_evento=  mysqli_insert_id($conexion);
            //insertar a usuariohaseevento según el valor de "para"
           
            $peticion = "SELECT * FROM usuario WHERE id_tipousuario =3";
            $query = mysqli_query($conexion, $peticion); 
            while($row=mysqli_fetch_assoc($query))
            {
                $usuario_ingreso= $row["ID_usuario"];
                $peticion="INSERT INTO usuariohasevento (id_evento, id_usuario) VALUES (' $id_evento', '$usuario_ingreso') ";
                $query2 = mysqli_query($conexion, $peticion); 
            }
            switch($para)
            {
                case "1":
                    {
                        //a todos
                        $peticion = "SELECT * FROM usuario";
                        $query = mysqli_query($conexion, $peticion); 
                        while($row=mysqli_fetch_assoc($query))
                        {
                            $usuario_ingreso= $row["ID_usuario"];
                            $peticion="INSERT INTO usuariohasevento (id_evento, id_usuario) VALUES (' $id_evento', '$usuario_ingreso') ";
                            $query2 = mysqli_query($conexion, $peticion); 

                        }
                        break;
                    }
                case "2":
                    {
                        //alumnos
                        $peticion = "SELECT * FROM usuario WHERE id_tipousuario =1 ";
                        $query = mysqli_query($conexion, $peticion); 
                        while($row=mysqli_fetch_assoc($query))
                        {
                            $usuario_ingreso= $row["ID_usuario"];
                            $peticion="INSERT INTO usuariohasevento (id_evento, id_usuario) VALUES (' $id_evento', '$usuario_ingreso') ";
                            $query2 = mysqli_query($conexion, $peticion); 
                        }
                        break;
                    }
                case "3":
                    {
                        //profes
                        $peticion = "SELECT * FROM usuario WHERE id_tipousuario =2 ";
                        $query = mysqli_query($conexion, $peticion); 
                        while($row=mysqli_fetch_assoc($query))
                        {
                            $usuario_ingreso= $row["ID_usuario"];
                            $peticion="INSERT INTO usuariohasevento (id_evento, id_usuario) VALUES (' $id_evento', '$usuario_ingreso') ";
                            $query2 = mysqli_query($conexion, $peticion); 
                        }
                        break;
                    }
                case "4":
                    {
                        //grupo
                        $entro="si";
                        if(!$seccion)
                        {
                            $peticion = "SELECT * FROM uhg INNER JOIN usuario ON usuario.id_usuario=uhg.id_usuario INNER JOIN grupo ON grupo.id_grupo= uhg.id_grupo WHERE grupo=$grupo";
                        }
                        else{
                            $peticion = "SELECT * FROM uhg INNER JOIN usuario ON usuario.id_usuario=uhg.id_usuario INNER JOIN grupo ON grupo.id_grupo= uhg.id_grupo WHERE grupo=$grupo AND seccion='$seccion'";
                        }
      
                        $query = mysqli_query($conexion, $peticion); 
                        while($row=mysqli_fetch_assoc($query))
                        {
                            $usuario_ingreso= $row["ID_usuario"];
                            $peticion="INSERT INTO usuariohasevento (id_evento, id_usuario) VALUES (' $id_evento', '$usuario_ingreso') ";
                            $query2 = mysqli_query($conexion, $peticion); 
                        }
                        break;
                    }
                case "5":
                    {
                        //grado
                        switch($grado)
                        {
                            case "4":
                                {
                                    $menor=400;
                                    $mayor=499;
                                    break;
                                }
                            case "5":
                                {
                                    $menor=500;
                                    $mayor=599;
                                    break;
                                }
                            case "6":
                                {
                                    $menor=600;
                                    $mayor=699;
                                    break;
                                }
                                
                        }
                        $peticion = "SELECT * FROM uhg INNER JOIN usuario ON usuario.id_usuario=uhg.id_usuario INNER JOIN grupo ON grupo.id_grupo= uhg.id_grupo  WHERE grupo between $menor AND $mayor";
                        $query = mysqli_query($conexion, $peticion); 
                        while($row=mysqli_fetch_assoc($query))
                        {
                            $usuario_ingreso= $row["ID_usuario"];
                            $peticion="INSERT INTO usuariohasevento (id_evento, id_usuario) VALUES (' $id_evento', '$usuario_ingreso') ";
                            $query2 = mysqli_query($conexion, $peticion); 
                        }
                        break;
                    }
            }
             
            

            $respuesta = array ("ok" => true, "texto" => "Listo") ;
    
      
    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    
    
   echo json_encode($respuesta);

    
?>
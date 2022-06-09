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
    var_dump($_POST);
    $id_usuario=$_SESSION["ID_usuario"];
    $nombre = (isset($_POST['nombre']) && $_POST["nombre"] != "")? $_POST['nombre'] : false;
    $materia = (isset($_POST['materia']) && $_POST["materia"] != "")? $_POST['materia'] : false;
    $publica= (isset($_POST['publica']) && $_POST["publica"] != "")? $_POST['publica'] : false;
    $contrasena= (isset($_POST['contrasena']) && $_POST["contrasena"] != "")? $_POST['contrasena'] : false;
    $grupo= (isset($_POST['grupo']) && $_POST["grupo"] != "")? $_POST['grupo'] : null;
    $fetch = (isset($_POST['fetch']) && $_POST['fetch'] != "")? $_POST['fetch'] : false;
    $seccion = (isset($_POST['seccion']) && $_POST['seccion'] != "")? $_POST['seccion'] : null;
    if($nombre)
    {
        $peticion = "SELECT * FROM materia WHERE nombreMateria='$nombre'";
        $query = mysqli_query( $conexion, $peticion ); 
        $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
        if($datos==NULL){

            if(isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name'] != "" )
            { 
                $name=$_FILES['imagen']['name'];
                $ext=pathinfo($name, PATHINFO_EXTENSION);
                $arch=$_FILES['imagen']['tmp_name'];
                $archivo=$grupo.$nombre.".".$ext;

                $ruta= "../Imgs/materias/$archivo";
                rename($arch, $ruta);
            }
            else{
                $ruta="../Imgs/ENP6.jpg";
            }
            if($contrasena)
            {
                $peticion = "INSERT INTO materia (nombreMateria, ruta_imagen, contrasena) VALUES ('$nombre', '$ruta', '$contrasena')" ;
            }
            else{
                $peticion = "INSERT INTO materia (nombreMateria, ruta_imagen) VALUES ('$nombre', '$ruta')" ;
            }
            
            $query = mysqli_query($conexion, $peticion); 
            $id_materia=  mysqli_insert_id($conexion);
            $peticion = "INSERT INTO phc (id_usuario, id_materia) VALUES ('$id_usuario','$id_materia')";
            $query = mysqli_query($conexion, $peticion); 
            $peticion = "INSERT INTO uhm (id_usuario, id_materia) VALUES ('$id_usuario','$id_materia')";
            $query = mysqli_query($conexion, $peticion); 
            //Otorgarle su clasificacion
            $peticion = "INSERT INTO mhc (id_clasificacion, id_materia) VALUES ('$materia','$id_materia')";
            $query = mysqli_query($conexion, $peticion);
            //insertar la materia al grupo que requiere: obtner el id_grupo y comprobar con la seccion
            if($grupo != null)
            {
                if($seccion == null)
                {
                    $peticion = "SELECT * from grupo WHERE grupo = '$grupo'";
                }
                else{
                    $peticion = "SELECT * from grupo WHERE grupo = '$grupo' AND seccion= '$seccion'";
               }
                $query = mysqli_query($conexion, $peticion); 
                while($row=mysqli_fetch_assoc($query))
                {
                    $id_grupoIn= $row['ID_grupo'];
                    $peticion = "INSERT INTO ghm (id_grupo, id_materia) VALUES ('$id_grupoIn', '$id_materia')";
                    $res = mysqli_query($conexion, $peticion);
                    $peticion="SELECT * from uhg WHERE id_grupo = $id_grupoIn";
                    $res2 = mysqli_query($conexion, $peticion);
                    while($row2=mysqli_fetch_assoc($res2))
                    {   
                        $usuario_ingreso=$row2["ID_usuario"];
                        $peticion="SELECT * from uhm WHERE id_usuario =  $usuario_ingreso AND id_materia = $id_materia";
                        $res3 = mysqli_query($conexion, $peticion);
                        $registros =mysqli_fetch_assoc($res3);
                        if($registros == null)
                        {
                            $peticion="INSERT INTO uhm (id_usuario, id_materia) VALUES (' $usuario_ingreso', '$id_materia') ";
                            $res3 = mysqli_query($conexion, $peticion);
                        }
                    }

                } 
         

        
            }
             
            

            $respuesta = array ("ok" => true, "texto" => "Todo bien") ;
    
        }
        else{
            $respuesta= array ("ok" => false, "texto" => "Una clase con este nombre ya esta registrada")   ;
        }
    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    
    
   echo json_encode($respuesta);

    
?>
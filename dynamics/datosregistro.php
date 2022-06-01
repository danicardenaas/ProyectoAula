<?php

    include("./config.php"); 

    $conexion = connect(); 

    $nombre = (isset($_POST['nombre']) && $_POST["nombre"] != "")? $_POST['nombre'] : false;
    $apellido = (isset($_POST['apellido']) && $_POST["apellido"] != "")? $_POST['apellido'] : false;
    $cumpleaños= (isset($_POST['cumpleaños']) && $_POST["cumpleaños"] != "")? $_POST['cumpleaños'] : false;
    $correo= (isset($_POST['correo']) && $_POST["correo"] != "")? $_POST['correo'] : false;
    $usuario= (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : false;
    $contraseña= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : false;
    $telefono = (isset($_POST['telefono']) && $_POST['telefono'] != "")? $_POST['telefono'] : "sin teléfono";
    $rol = (isset($_POST['rol']) && $_POST['rol'] != "")? $_POST['rol'] : false;
    $seguir=true;
    if($nombre && $apellido && $cumpleaños && $correo && $usuario && $contraseña && $telefono && $rol)
    {
        $peticion = "SELECT * FROM usuario WHERE correo='$correo'";
        $query = mysqli_query( $conexion, $peticion ); 
        $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
        if($datos==NULL){

            $peticion = "SELECT * FROM usuario WHERE telefono='$telefono'";
            $query = mysqli_query( $conexion, $peticion ); 
            $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);

            if($datos==NULL){

                $peticion = "SELECT * FROM usuario WHERE usuario='$usuario'";
                $query = mysqli_query( $conexion, $peticion ); 
                $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
                
                if($datos==NULL){

                    if($rol==1)
                    {
                        //si es estudiante
                        $cuenta = (isset($_POST['cuenta']) && $_POST["cuenta"] != "")? $_POST['cuenta'] : false;
                        if ($cuenta)
                        {
                            if(count(str_split( $cuenta)) != 9 || (str_split( $cuenta) [0] != 3 && str_split( $cuenta) != 1) && $cuenta)
                            {
                                $seguir=false;
                                $respuesta = array ("ok" => false, "texto"=>"Escribe un número de cuenta válido");
                            }
                        }
                        else{
                            $seguir=false;
                            $respuesta = array ("ok" => false, "texto"=>"Escribe un número de cuenta válido");
                        }
                        
                        if($seguir)
                        {
                            $grupo= (isset($_POST['grupo']) && $_POST["grupo"] != "")? $_POST['grupo'] : false;
                            $seccion = (isset($_POST['seccion']) && $_POST['seccion'] != "")? $_POST['seccion'] : false;
                            if($grupo && $seccion){
                                $peticion = "SELECT * FROM grupo WHERE id_grupo=$grupo"; 
                                $query = mysqli_query( $conexion, $peticion); 
                                $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
                                if($datos == NULL)
                                {
                                    $peticion = "INSERT INTO grupo(grupo, seccion) VALUES ('$grupo', 'A')";
                                    $query = mysqli_query( $conexion, $peticion); 
                                    $peticion = "INSERT INTO grupo (grupo, seccion) VALUES ('$grupo', 'B')";
                                    $query = mysqli_query( $conexion, $peticion); 
                                }
                            }
                            else
                            {
                                $seguir=false;
                                $respuesta = array ("ok" => false, "texto"=>"Escribe todos los datos");
                            }
                            
                        }
                    
                        
                    }
                    else if($rol == 2){
                        // si es profesor
                        $cuenta = (isset($_POST['rfc']) && $_POST["rfc"] != "")? $_POST['rfc'] : false;
                        if($cuenta)
                        {
                            if(count(str_split( $cuenta)) != 10 )
                            {
                                $seguir=false;
                                $respuesta = array ("ok" => false, "texto"=>"Escribe un RFC válido");
                            }
                        }
                        else{
                            $seguir=false;
                            $respuesta = array ("ok" => false, "texto"=>"Escribe un RFC válido");
                        }
                        
                    }
                    if($seguir)
                    {
                        if(isset($_FILES['foto']) && $_FILES['foto']['tmp_name'] != "" )
                        { 
                            //detener si no suben pic o que no importe
                            $name=$_FILES['foto']['name'];
                            $ext=pathinfo($name, PATHINFO_EXTENSION);
                            $arch=$_FILES['foto']['tmp_name'];
                            $archivo=$usuario.$cuenta.".".$ext;
            
                            $ruta= "../Imgs/usuario/$archivo";
                            rename($arch, $ruta);
                        }
                        else{
                            $ruta="Desconocido";
                        }
                        $peticion = "INSERT INTO usuario (nombre, apellidos, correo, contrasena, usuario, fecha_nacimiento,telefono, ID_tipousuario, Archivo, cuenta)
                        VALUES ('$nombre', '$apellido', '$correo', '$contraseña', '$usuario', '$cumpleaños', '$telefono', '$rol', '$ruta', $cuenta)"; 
                        $query = mysqli_query($conexion, $peticion); 
                       
                        
                       
                        if($rol==1)
                        {
                            $peticion = "SELECT ID_usuario FROM usuario WHERE usuario = '$usuario'";
                            $query = mysqli_query($conexion, $peticion); 
                            $datos= mysqli_fetch_array($query);
                            $id_usuario=$datos['ID_usuario'];
                            $peticion = "SELECT ID_grupo FROM grupo WHERE grupo = '$grupo' AND seccion= '$seccion'";
                            $query = mysqli_query($conexion, $peticion); 
                            $datos= mysqli_fetch_array($query);
                            $id_grupo=$datos['ID_grupo'];
                            $peticion = "INSERT INTO UHG (ID_usuario, ID_grupo) VALUES ($id_usuario, '$grupo')";
                            $query = mysqli_query($conexion, $peticion); 
                            
                        }
                        $respuesta = array ("ok" => true, "texto" => "Todo bien") ;
                
                    }
                    
                }
                else
                {
                    $respuesta= array ("ok" => false, "texto" => "Este usuario ya existe, prueba con otro")   ;
                }
            }
            else{
                $respuesta= array ("ok" => false, "texto" => "Este telefono ya esta registrado")   ;
            }
        }
        else{
            $respuesta= array ("ok" => false, "texto" => "Este correo ya esta registrado")   ;
        }

    }
    else{
        $respuesta= array ("ok" => false, "texto" => "Llena todos los campos")   ;
    }
    

   echo json_encode($respuesta);

    
?>
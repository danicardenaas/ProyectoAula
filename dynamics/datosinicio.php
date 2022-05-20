<?php


    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $usuario = (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : "no especifico";
    $contraseña= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : "no especifico";
   
    $peticion = "INSERT INTO usuario VALUES ('$usuario', '$contraseña')"; 


    $query = mysqli_query($conexion, $peticion); 
    var_dump($query); 

    $peticion = "SELECT contrasena FROM usuario WHERE usuario='$usuario'";
    $query = mysqli_query( $conexion, $peticion); 
    $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
    if($datos!=NULL)
    {
        if($datos['contrasena']==$contraseña)
        {
            
            $mensaje[1]=true;
            $mensaje[0]=$usuario;
            $_SESSION["nombre"]=$usuario;
            $_SESSION["mensaje"]=" ";
        }
        else{
            $mensaje[0]="Contaseña incorrecta.";
            $mensaje[1]=false;
            $_SESSION["nombre"]=false;
            $_SESSION["mensaje"]="Contaseña incorrecta";
        }
        
    }
    else{
        $mensaje[0]="No hubo coincidencias del usuario.";
        $mensaje[1]=false;
        $_SESSION["nombre"]=false;
        $_SESSION["mensaje"]="No hubo coincidencias del usuario.";
    }

 
    if($mensaje[1]==false)
    {
         $nuevaURL='../templates/inicio.php';
           header('Location: '.$nuevaURL);
    }

    if(isset($_SESSION["nombre"]) && $_SESSION["nombre"]!=false)
    {
        $nuevaURL='../templates/inicioConSesion.php';
        header('Location: '.$nuevaURL);
    }
   

?>



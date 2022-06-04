<?php


    include("./config.php"); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $conexion = connect(); 
    $usuario = (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : "no especifico";
    $contrasena= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : "no especifico";

    function verificar_contra ($contrasena, $original, $sal)
    {
        $char = str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz");
        for($i = 0;$i<count($char);$i++)
        {
            for($j = 0;$j<count($char);$j++)
            {
                $pimienta = $char[$i].$char[$j];
                if (hash("sha256", $contrasena.$pimienta.$sal) === $original){
                    $txt=hash("sha256", $contrasena.$pimienta.$sal);
                    var_dump($txt);
                    echo "<br>";
                    return true;
                }
            }
        }
        return false;
    }
    $peticion = "SELECT * FROM usuario WHERE usuario='$usuario'";
    $query = mysqli_query( $conexion, $peticion); 
    $datos=mysqli_fetch_array($query, MYSQLI_ASSOC);
    
    if($datos!=NULL)
    {   
        
       $original = $datos['contrasena'];
     
        $sal = $datos["sal"];
        $bool=verificar_contra($contrasena, $original, $sal);
        if($bool)
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

        $_SESSION["ID_usuario"]=$datos['ID_usuario'];
        header('Location: '.$nuevaURL);
        
    }
   

?>



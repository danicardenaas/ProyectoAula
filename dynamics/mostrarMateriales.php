<?php
    //recordar lo de los filtros
    include("./config.php"); 
    $conexion = connect(); 
    session_name("SesionUsuario");
    session_id("123456789");
    session_start();
    $id_usuario=$_SESSION["ID_usuario"];
    $rol=$_SESSION["rol"];
    $materia = (isset($_POST['materia']) && $_POST["materia"] != "")? $_POST['materia'] :false;
    $tipo = (isset($_POST['tipo']) && $_POST["tipo"] != "")? $_POST['tipo'] :false;
    $usuarioB = (isset($_POST['usuarioB']) && $_POST["usuarioB"] != "")? $_POST['usuarioB'] :false;
    $filtrado = (isset($_POST['filtrado']) && $_POST["filtrado"] != "")? $_POST['filtrado'] :false;
    switch($filtrado)
    {
        case "0":
            {
                $peticion = "SELECT * FROM material WHERE reportado = 0";
                break;
            }
        case "1":
            {
                $peticion = "SELECT * FROM material WHERE id_clasificacion=$materia  AND reportado =0";
                break;
            }
        case "2":
            {
                $peticion = "SELECT * FROM material NATURAL JOIN usuario WHERE usuario='$usuarioB' AND reportado = 0";
                break;
            }
        case "3":
            {
                $peticion = "SELECT * FROM material WHERE reportado =0 ORDER BY likes DESC";
                break;
            }
        case "4":
            {
                $peticion = "SELECT * FROM material where ID_tipoMaterial = $tipo  AND reportado =0";
                break;
            }

    }
    $query = mysqli_query($conexion, $peticion);
    $i = 0;
    $datos = array(null);
    $archivos = array(null);
    $usuarios = array(null);
    $clases = array(null);
    $tipos = array(null);

    while($row = mysqli_fetch_assoc($query))
    {
        $datos[$i] = $row;
        $id_usuario = $row["ID_usuario"];
        //Guardar el nombre del usuario asociado al ID
        $peticion = "SELECT * FROM usuario WHERE id_usuario = $id_usuario";
        $query1 = mysqli_query($conexion, $peticion);
        $datosUs = mysqli_fetch_assoc($query1);
        $usuarios[$i]=$datosUs["usuario"];
        //Guardar los nombres de las materias asociadas
        $id_clasificacion = $row["ID_clasificacion"];
        $peticion = "SELECT * FROM clasificaciones WHERE id_clasificacion = $id_clasificacion";
        $query1 = mysqli_query($conexion, $peticion);
        $datosUs = mysqli_fetch_assoc($query1);
        $clases[$i]=$datosUs["nombre"];
        //Guardar los nombre de los tipos asociados
        $id_tipo= $row["ID_tipoMaterial"];
        $peticion = "SELECT * FROM tipocontenido WHERE ID_tipoMaterial = $id_tipo";
        $query1 = mysqli_query($conexion, $peticion);
        $datosUs = mysqli_fetch_assoc($query1);
        $tipos[$i]=$datosUs["nombreMat"];
        //guardar datos de los archivos del material
        $id_material = $row["ID_material"];
        $peticion = "SELECT * FROM archivostablon where id_material = $id_material";
        $query2 = mysqli_query($conexion, $peticion);
        $x=0;
        while($datosArch = mysqli_fetch_assoc($query2))
        {
            $archivos[$i][$x] = $datosArch;
            $x++;
        }
        $i++;
    }

    $respuesta= array("res" =>$datos, "arch" =>$archivos, "usuarios" => $usuarios,
                      "materias" => $clases, "tipos" => $tipos, "usuario" =>$id_usuario, 
                       "rol" =>$rol);
    echo json_encode($respuesta);
    
?>
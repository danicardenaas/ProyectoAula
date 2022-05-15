<?php

    include("./config.php"); 

    $conexion = connect(); 

    var_dump($conexion); 

    $nombre = (isset($_POST['nombre']) && $_POST["nombre"] != "")? $_POST['nombre'] : "no especifico";
    $apellido = (isset($_POST['apellido']) && $_POST["apellido"] != "")? $_POST['apellido'] : "no especifico";
    $cuenta = (isset($_POST['cuenta']) && $_POST["cuenta"] != "")? $_POST['cuenta'] : "no especifico";
    $cumpleaños= (isset($_POST['cumpleaños']) && $_POST["cumpleaños"] != "")? $_POST['cumpleaños'] : "no especifico";
    $correo= (isset($_POST['correo']) && $_POST["correo"] != "")? $_POST['correo'] : "no especifico";
    $grupo= (isset($_POST['grupo']) && $_POST["grupo"] != "")? $_POST['grupo'] : "no especifico";
    $usuario= (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : "no especifico";
    $contraseña= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : "no especifico";
    $telefono = (isset($_POST['telefono']) && $_POST['telefono'] != "")? $_POST['telefono'] : "sin teléfono";
    $rol = (isset($_POST['rol']) && $_POST['rol'] != "")? $_POST['rol'] : "no especifico";
    
    $peticion = "INSERT INTO usuario VALUES ('$cuenta', '$nombre', '$apellido ', '$correo', '$contraseña', '$usuario', '$cumpleaños', '$telefono', ' ', '$rol', '$grupo', ' ', ' ')"; 
    $peticion = "INSERT INTO usuario (ID_usuario, nombre) VALUES ('$cuenta', '$nombre', '$apellido ', '$correo', '$contraseña', '$usuario', '$cumpleaños', '$telefono', ' ', '$rol', '$grupo', ' ', ' ')"; 

    $query = mysqli_query($conexion, $peticion); 
    var_dump($query); 
    //echo $telefono; 
    /*echo "<table border='1'>
                <thead>
                    <tr>
                    <th colspan='2'>$nombre $apellido</th>  
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td>Correo: $correo</td>
                        <td>Cuenta: $cuenta</td>
                        <td rowspan='3'><img src='uploads\$fileName' alt='foto' width='500' height='300' />
                    </tr>
                    <tr>
                        <td>Cumpleaños: $cumpleaños</td>
                        <td>Grado: $grado</td>
                    </tr>
                     <tr>
                        <td>Usuario: $usuario</td>
                        <td>Contraseña: $contraseña</td>
                    </tr>
                </tbody>
            </table><br/><br/>"; */
?>
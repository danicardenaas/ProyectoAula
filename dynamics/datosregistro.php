<?php
    $nombre = (isset($_POST['nombre']) && $_POST["nombre"] != "")? $_POST['nombre'] : "no especifico";
    $apellido = (isset($_POST['apellido']) && $_POST["apellido"] != "")? $_POST['apellido'] : "no especifico";
    $cuenta = (isset($_POST['cuenta']) && $_POST["cuenta"] != "")? $_POST['cuenta'] : "no especifico";
    $cumpleaños= (isset($_POST['cumpleaños']) && $_POST["cumpleaños"] != "")? $_POST['cumpleaños'] : "no especifico";
    $correo= (isset($_POST['correo']) && $_POST["correo"] != "")? $_POST['correo'] : "no especifico";
    $grado= (isset($_POST['grado']) && $_POST["grado"] != "")? $_POST['grado'] : "no especifico";
    $usuario= (isset($_POST['usuario']) && $_POST["usuario"] != "")? $_POST['usuario'] : "no especifico";
    $contraseña= (isset($_POST['contraseña']) && $_POST["contraseña"] != "")? $_POST['contraseña'] : "no especifico";
    $foto= (isset($_POST['foto']) && $_POST["foto"] != "")? $_POST['foto'] : "no especifico";
    echo "<table border='1'>
                <thead>
                    <tr>
                    <th colspan='2'>$nombre $apellido</th>  
                    </tr> 
                </thead>
                <tbody>
                    <tr>
                        <td>Correo: $correo</td>
                        <td>Cuenta: $cuenta</td>
                        <td rowspan='3'><img src='$foto' alt='Foto' width='500' height='300' />
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
            </table><br/><br/>";
?>
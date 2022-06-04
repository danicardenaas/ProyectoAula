<?php

    include("./config.php"); 

    $conexion = connect(); 
    $masMes = (isset($_POST['masMes']) && $_POST["masMes"] != "")? $_POST['masMes'] : false;
    $hoy = getdate();
    
    $mes = $hoy["mon"];
    
    $año = $hoy["year"];
    if($masMes>0)
    {
        $i=0;
        while($i<$masMes)
        {
            $mes++;
            if($mes>=12)
            {
                $mes=1;
                $año++;
            }
            $i++;
        }
    }
    else{
        $mes = $mes + $masMes;
        if($mes<1)
        {
            $mes=12;
        }
    }

    
    
    
   
   
    $primero = mktime(0,0, 0, $mes, 1,$año );
    $primer = getdate($primero);
    $diaUno = $primer["wday"];
    
    if(checkdate($mes, 31, $año)){
        $ultimo = 31;
    }
    else if((checkdate($mes, 30, $año))){
        $ultimo = 30;
    }
    else if((checkdate($mes, 29, $año))){
        $ultimo = 29;
    }
    else if((checkdate($mes, 28, $año))){
        $ultimo = 28;
    }
    $respuesta = array ("mes" => $mes, "año"=>$año, "primero" => $diaUno, "ultimo" =>$ultimo);
    echo json_encode($respuesta);

    //Sacar los datos de la fecha





?>
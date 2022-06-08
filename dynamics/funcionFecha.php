<?php
    function fecha(){
        date_default_timezone_set("America/Mexico_City");
        $hoy = getdate();
        $mes = $hoy["mon"];
        $año = $hoy["year"];
        $dia =  $hoy["mday"];
        $horas =  $hoy["hours"];
        $min =  $hoy["minutes"];
        $seg=  $hoy["seconds"];
        $mk=mktime($horas, $min, $seg, $mes, $dia, $año);
        $fecha = date("Y-m-d H:i:s", $mk);
  
        return $fecha;
    }
?>
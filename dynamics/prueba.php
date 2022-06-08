<?php
    
    $calif = (isset($_POST['calif']) && $_POST["calif"] != "")? $_POST['calif'] :0;
    $coment = (isset($_POST['coment']) && $_POST["coment"] != "")? $_POST['coment'] : "No especifico";
  

    var_dump($coment);

    var_dump($calif);
?>
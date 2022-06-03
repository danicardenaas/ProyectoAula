<?php
  require "./config.php";
  $conexion = connect(); 
if(!$con)
{
  echo "No se conecto la BD";
}
else{
  if(isset($_GET['clase']))
  {
    
    $query = $_GET['clase'];
    
    $query2='%'.$query.'%';

    $sql="SELECT id_materia, nombreMateria FROM materia WHERE nombreMateria LIKE '$query2'";

    $res = mysqli_query($con, $sql);
    $resultados=[];
    while($row=mysqli_fetch_assoc($res))
    {
      $resultados[] = $row;
    }

  
  }
  if(isset($_GET['claseID']))
  {
    
    $claseID = $_GET['claseID'];
    
    $user=$_SESSION["ID_usuario"];
    $peticion = " SELECT * FROM uhm  NATURAL JOIN materia WHERE id_usuario=$user AND id_materia = $claseID";
    $query = mysqli_query($conexion, $peticion);
    $datos = mysqli_fetch_assoc($query);
    if($datos != NULL)
    {
        $resultados= array ("inscrito"=> "");
    }
    $sql="SELECT * FROM materia WHERE ID_materia = $claseID ";
    $res = mysqli_query($con, $sql);
    $resultados=mysqli_fetch_assoc($res);
  }
  
  
}  
echo json_encode($resultados);

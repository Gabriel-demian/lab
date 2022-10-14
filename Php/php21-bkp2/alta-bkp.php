<?php 
    include "db.php";

    $respuesta_estado = "resp";
    $proyectos=[];
    
    /*Datos*/
    $proyecto = $_POST['proyecto'];
    $referente = $_POST['referente'];
    $pais = $_POST['pais'];
    $inicio = $_POST['inicio'];
    $ingresos = $_POST['ingresos'];
    
    $respuesta_estado = $proyecto ." ". $referente ." ". $pais ." ". $inicio ." ". $ingresos;
    $query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos);";
    
   
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query FAILED' . mysqli_error());
    }

    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>

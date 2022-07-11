<?php 
    include "db.php";

    $respuesta_estado = "resp";
    
    /*Datos*/
    $registro = $_POST['registro'];
    $proyecto = $_POST['proyecto'];
    $referente = $_POST['referente'];
    $pais = $_POST['pais'];
    $inicio = $_POST['inicio'];
    $ingresos = $_POST['ingresos'];
    
    $sql = "INSERT INTO `proyectos` ('proyecto', 'referente', 'pais', 'inicio', 'ingresos') VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos) WHERE 'registro' = '$registro';";
    $result = $conn->query($sql);

    if ($result === TRUE) 
    {
        $respuesta_estado = "Artículo modificado exitosamente!";
        $objArticulos->success = TRUE;
    } 
    else 
    {
        $respuesta_estado = "Error al modificar el artículo: " . $objArticulos->codArticulo = $_POST['codArticulo'];
    }
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }

    mysqli_close($conn);

    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>

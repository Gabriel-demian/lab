<?php 
    include "db.php";

    $respuesta_estado = "resp";
    $proyectos=[];
    
    /*Datos*/
    $proyecto = $_POST['alta_proyecto'];
    $referente = $_POST['alta_referente'];
    $pais = $_POST['alta_pais'];
    $inicio = $_POST['alta_fecha'];
    $ingresos = $_POST['alta_ingresos'];
    
    $documento = $_FILES['formPDF']['tmp_name'];

    if(empty($documento)) {
        $query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos);";
        $result = mysqli_query($connection, $query);

        if ($result === TRUE) 
        {
            $respuesta_estado = "Artículo añadido exitosamente!</br>Falta el archivo PDF";
            $objArticulos->success = TRUE;
        } 
        else 
        {
            $respuesta_estado = "Error al agregar el proyecto: " . $proyecto;
        }
    } else{
            $documentoPdf = base64_encode(file_get_contents($documento));
            $query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos,pdf) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos,'$documentoPdf');";

            $result = mysqli_query($connection, $query);

            if ($result === TRUE) {
                $respuesta_estado = "Proyecto " . $proyecto . "añadido exitosamente!</br>Con archivo PDF!";
                $objArticulos->success = TRUE;
            } 
            else {
                $respuesta_estado = "Error al agregar el proyecto: " . $proyecto;
            }
    }

    mysqli_close($connection);
    
    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>

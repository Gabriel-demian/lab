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
    /*
    $proyecto = 'PPP';
    $referente = 'PPP';
    $pais = 'PPP';
    $inicio = '2022-07-06';
    $ingresos = 121212;
    */
    
    if(!isset($_FILES['formPDF'])) {
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

            $documentoPdf = base64_encode(file_get_contents($_FILES['formPDF']['tmp_name']));

            $query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos);";

            $result = mysqli_query($connection, $query);

            $sql = "UPDATE `proyectos` SET `pdf`= '$documentoPdf' WHERE registro = $registro;";
            $result = $connection->query($sql);

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

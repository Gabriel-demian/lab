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
    
    //$respuesta_estado = $proyecto ." ". $referente ." ". $pais ." ". $inicio ." ". $ingresos;
    //$query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos);";
    
    if(!isset($_FILES['formPDF'])){
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
            die('Query FAILED' . mysqli_error());
        }
    }else{

        if (empty($_FILES['formPDF']['name'])){
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
                die('Query FAILED' . mysqli_error());
            }
        }else{

            $documentoPdf = base64_encode(file_get_contents($_FILES['formPDF']['tmp_name']));

            $query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos,pdf) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos,$documentoPdf);";

            $result = mysqli_query($connection, $query);

            if ($result === TRUE) {
                $respuesta_estado = "Proyecto " . $proyecto . "añadido exitosamente!</br>Con archivo PDF!";
                $objArticulos->success = TRUE;
            } 
            else {
                $respuesta_estado = "Error al agregar el proyecto: " . $proyecto;
            }
            mysqli_close($conn);
        }
    }
    if(!$result){
        die('Query FAILED' . mysqli_error());
    }

    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>

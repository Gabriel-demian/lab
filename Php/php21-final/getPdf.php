<?php
    $objArticulos = new stdClass();
    $objArticulos->success = FALSE;
    
    include "db.php";
    
    if(!isset($_GET['registro'])) $respuesta_estado = "No se ha enviado un codigo de artículo válido";
    else 
    {
        $objArticulos->codArticulo = $_GET['registro'];

        $sql = "SELECT `pdf` FROM `proyectos` WHERE `registro`='" . $_GET['registro'] . "'";
        
        $result = $connection->query($sql);
    
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $objArticulos->documentoPDF = $row["pdf"];
            }
            if (!empty($objArticulos->documentoPDF))
            {
                $objArticulos->success = TRUE;
                $respuesta_estado = "Consulta exitosa!";
            } 
            else $respuesta_estado = "El registro enviado no posee archivo PDF";
        }
        else $respuesta_estado = "No se encuentra un artículo con el codigo de registro: " . $objArticulos->codArticulo;
    }
    mysqli_close($connection);
    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos,JSON_INVALID_UTF8_SUBSTITUTE); // envio objArticulos como JSON al front
?>
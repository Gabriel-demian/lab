<?php 
    $dbname="br3fe8tgn4zpnkb9zrae"; 
    $host="br3fe8tgn4zpnkb9zrae-mysql.services.clever-cloud.com"; 
    $host2="mysql.services.clever-cloud.com";
    $user ="uf0gulncszpwfg3o"; 
    $password = "XkSQNAxhrorlhlx9Hrbm"; 


    $connection = mysqli_connect ( $host, $user, $password, $dbname );

    $objArticulos = new stdClass();
    $objArticulos->success = FALSE;

    if($connection){
        echo ("exito");
        $objArticulos->success = TRUE;
    }else{
        echo ("mal");
    }

    $respuesta_estado = "resp";
    
    /*Datos*/
    $registro = $_POST['edit_registro'];
    $proyecto = $_POST['edit_proyecto'];
    $referente = $_POST['edit_referente'];
    $pais = $_POST['edit_pais'];
    $inicio = $_POST['edit_fecha'];
    $ingresos = $_POST['edit_ingresos'];

    $documento = $_FILES['formPDF']['tmp_name'];

    if(empty($documento)) {
        $sql = "UPDATE `proyectos` SET `proyecto`= '$proyecto',`referente`='$referente',`pais`= '$pais',`inicio`='$inicio',`ingresos`= $ingresos WHERE registro = $registro;";
        $result = $connection->query($sql);
    
        if ($result === TRUE) 
        {
            $respuesta_estado = "Registro modificado exitosamente!";
            $objArticulos->success = TRUE;
        } 
        else 
        {
            $respuesta_estado = "Error al modificar el proyecto: " . $proyecto;
        }

    }else{
        $documentoPdf = base64_encode(file_get_contents($documento));
        $sql = "UPDATE `proyectos` SET `proyecto`= '$proyecto',`referente`='$referente',`pais`= '$pais',`inicio`='$inicio',`ingresos`= $ingresos,`pdf`= $documentoPdf WHERE registro = $registro;";
        $result = $connection->query($sql);

        if ($result === TRUE) 
        {
            $respuesta_estado = "Proyecto " . $proyecto . "modificado exitosamente!</br>Con archivo PDF!";
            $objArticulos->success = TRUE;
        } 
        else 
        {
            $respuesta_estado = "Error al modificar el proyecto: " . $proyecto;
        }
    }
  
    

    mysqli_close($connection);

    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>
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
    $registro = $_POST['registro'];
    $proyecto = $_POST['proyecto'];
    $referente = $_POST['referente'];
    $pais = $_POST['pais'];
    $inicio = $_POST['inicio'];
    $ingresos = $_POST['ingresos'];
  
    $sql = "UPDATE `proyectos` SET `proyecto`= '$proyecto',`referente`='$referente',`pais`= '$pais',`inicio`='$inicio',`ingresos`= $ingresos WHERE registro = $registro;";
    $result = $connection->query($sql);

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

    mysqli_close($connection);

    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>
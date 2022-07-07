<?php 
    echo json_encode($_POST);
    $dbname="bv1npn2veaacv2l7ghih"; 
    $host="bv1npn2veaacv2l7ghih-mysql.services.clever-cloud.com"; 
    $host2="mysql.services.clever-cloud.com";
    $user ="u6uxnal5anrjzncq"; 
    $password = "mnNP6kMFSJZGKiXvgWMD"; 
    $respuesta_estado = "resp";
    $proyectos=[];

    $connection = mysqli_connect ( $host, $user, $password, $dbname );


    $objArticulos = new stdClass();
    $objArticulos->success = FALSE;

    if($connection){
        echo ("exito");
        $objArticulos->success = TRUE;
    }else{
        echo ("mal");
    }

    /*Datos*/
    


    $proyecto = $_POST['proyecto'];
    $referente = $_POST['referente'];
    $pais = $_POST['pais'];
    $inicio = $_POST['inicio'];
    $ingresos = $_POST['ingresos'];
    
    /*Datos FUNCIONA
    $proyecto = "UN PROYECETO";
    $referente = "LO QUE SEA";
    $pais = "chile";
    $inicio = "2022-10-20";
    $ingresos =  "12231";
    */
    $respuesta_estado = $proyecto ." ". $referente ." ". $pais ." ". $inicio ." ". $ingresos;
    $query = "INSERT INTO proyectos (proyecto,referente,pais,inicio,ingresos) VALUES ('$proyecto','$referente','$pais','$inicio',$ingresos);";
    
   
    $result = mysqli_query($connection, $query);

    if(!$result){
        die('Query FAILED' . mysqli_error());
    }

    $objArticulos->respuesta_estado = $respuesta_estado;
    echo json_encode($objArticulos);

?>

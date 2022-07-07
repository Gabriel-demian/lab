<?php 
    $dbname="bv1npn2veaacv2l7ghih"; 
    $host="bv1npn2veaacv2l7ghih-mysql.services.clever-cloud.com"; 
    $user ="u6uxnal5anrjzncq"; 
    $password = "mnNP6kMFSJZGKiXvgWMD"; 
    $respuesta_estado = "resp";
    $proyectos=[];

    try { 
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password); /*Database Handle*/ 
        $respuesta_estado = $respuesta_estado . "\nconexion exitosa"; 
        echo ("exito");
    } catch (PDOException $e) { 
        $respuesta_estado = $respuesta_estado . "\n" . $e->getMessage(); 
        echo ("falló");
    }

    $sql="select * from proyectos " ;

    $stmt = $dbh->prepare($sql);

    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
    $stmt->execute();

    While($fila = $stmt->fetch()) {
        $objProyecto = new stdClass();
        $objProyecto->registro=$fila['registro'];
        $objProyecto->proyecto=$fila['proyecto'];
        $objProyecto->referente=$fila['referente'];
        $objProyecto->pais=$fila['pais'];
        $objProyecto->inicio=$fila['inicio'];
        $objProyecto->ingresos=$fila['ingresos'];
        array_push($proyectos,$objProyecto);
    }

    $objProyecto = new stdClass(); 
    $objProyecto->proyectos=$proyectos; 
    $objProyecto->cuenta=count($proyectos);

    $salidaJson = json_encode($objProyecto);

    $dbh = null;

    echo $salidaJson;
?>
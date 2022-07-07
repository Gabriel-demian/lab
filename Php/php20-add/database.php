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
        //echo ("exito");
    } catch (PDOException $e) { 
        $respuesta_estado = $respuesta_estado . "\n" . $e->getMessage(); 
        echo ("falló");
    }

    

    $sql="select * from proyectos " ;

    

    switch($_GET['orden']){
        case "registro":
            $sql = $sql . "ORDER BY registro ";
            break; 
        case "proyecto":
            $sql = $sql . "ORDER BY proyecto ";
            break;
        case "referente":
            $sql = $sql . "ORDER BY referente ";
            break;  
        case "pais":
            $sql = $sql . "ORDER BY pais ";
            break; 
        case "inicio":
            $sql = $sql . "ORDER BY inicio ";
            break;
        case "ingresos":
            $sql = $sql . "ORDER BY ingresos ";
            break;   
    }

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

    $dbh = null;

    echo json_encode($objProyecto);
?>
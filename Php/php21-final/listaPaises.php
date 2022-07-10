<?php 
    $dbname="br3fe8tgn4zpnkb9zrae"; 
    $host="br3fe8tgn4zpnkb9zrae-mysql.services.clever-cloud.com"; 
    $user ="uf0gulncszpwfg3o"; 
    $password = "XkSQNAxhrorlhlx9Hrbm"; 
    $respuesta_estado = "resp";

    try { 
        $dsn = "mysql:host=$host;dbname=$dbname";
        $dbh = new PDO($dsn, $user, $password); /*Database Handle*/ 
        $respuesta_estado = $respuesta_estado . "\nconexion exitosa"; 
        //echo ("exito");
    } catch (PDOException $e) { 
        $respuesta_estado = $respuesta_estado . "\n" . $e->getMessage(); 
        echo ("falló");
    }
    
    $paises=[];
    
    $sql="select * from paises " ;
    
    $stmt = $dbh->prepare($sql);

    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    
    $stmt->execute();

    While($fila = $stmt->fetch()) {
        $objPais = new stdClass();
        $objPais->paises=$fila['pais'];
        array_push($paises,$objPais);
    }

    $objPais = new stdClass(); 
    $objPais->paises=$paises; 

    $dbh = null;

    echo json_encode($objPais);
?>
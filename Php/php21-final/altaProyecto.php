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
    
    $sql="INSERT INTO 'proyectos' ('proyecto','referente','pais','inicio','ingresos')
            VALUES ('" . $_POST['proyecto'] . "','" . $_POST['referente'] . "','" . $_POST['pais']. "'," 
            . $_POST['inicio'] . "," . $_POST['ingresos'] . "')"; 
    
    /* 
    $sql = $sql .

    $sql = $sql . "'%" . $_POST['proyecto'] . "%', ";
    $sql = $sql . "'%" . $_POST['referente'] . "%', ";
    $sql = $sql . "'%" . $_POST['pais'] . "%', ";
    $sql = $sql . "'%" . $_POST['inicio'] . "%', ";
    $sql = $sql . ""   . $_POST['ingresos'] . ");";
    */



    $stmt = $dbh->prepare($sql);

    
    $stmt->execute();

    $dbh = null;

?>
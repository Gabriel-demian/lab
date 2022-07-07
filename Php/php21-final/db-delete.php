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

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM task WHERE id = $id";

        $stmt = $dbh->prepare($sql);

        $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        
        $stmt->execute();



        if(!$stmt) {
          die("Query Failed.");
        }
      
        $_SESSION['message'] = 'Task Removed Successfully';
        $_SESSION['message_type'] = 'danger';
        header('Location: index.php');
?>
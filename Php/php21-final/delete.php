<?php 
    include "db.php";
    $respuesta_estado = "resp";

    if(isset($_GET['registro'])) {
        $registro = $_GET['registro'];
        $sql = "DELETE FROM proyectos WHERE registro = $registro";

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
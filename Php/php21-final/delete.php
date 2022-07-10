<?php 
    include "db.php";
    $respuesta_estado = "resp";

    if(isset($_GET['registro'])) {

      $registro = $_GET['registro'];
      $query = "DELETE FROM proyectos WHERE registro = $registro";

      $result = mysqli_query($connection, $query);

      if(!$result){
          die('Query FAILED' . mysqli_error());
      }

      $objArticulos->respuesta_estado = $respuesta_estado;
      echo json_encode($objArticulos);
      
    }
?>
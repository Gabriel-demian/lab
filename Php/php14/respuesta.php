<?php
    $dato=$_GET['dato'];

    $claveEncriptadam = md5($dato); 
    $claveEncriptadas = sha1($dato);

    echo "<h2>Ejercicio de encriptacion</h2>";
    echo "<br>";
    echo "<h2>Dato = " . $_GET['dato']."</h2>";
    echo "<h3>Llave encriptada por sha1 (160 bits o 20 pares hexadecimales) " ."<br>".$claveEncriptadas;
    echo "<hr><h2>Dato = " . $_GET['dato']."</h2>";
    echo "<h3>Llave encriptada por md5 (128 bits o 16 pares hexadecimales)" ."<br>".$claveEncriptadam;

    echo "<hr><a href='../index.php'><button style='font: size 2em;color: red; background-color:black;'>Volver</button>";
?>

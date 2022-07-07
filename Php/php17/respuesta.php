<?php
    $dato=$_POST['clave'];
    

    $claveEncriptadam = md5($dato); 
    $claveEncriptadas = sha1($dato);

    echo "<hr><h2>Dato = " . $_POST['clave']."</h2>";
    echo "<h3>Llave encriptada por sha1 (160 bits o 20 pares hexadecimales) " ."<br>".$claveEncriptadas;
    echo "<h3>Llave encriptada por md5 (128 bits o 16 pares hexadecimales)" ."<br>".$claveEncriptadam;
?>

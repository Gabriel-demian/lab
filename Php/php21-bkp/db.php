<?php 
    $dbname="br3fe8tgn4zpnkb9zrae"; 
    $host="br3fe8tgn4zpnkb9zrae-mysql.services.clever-cloud.com"; 
    $host2="mysql.services.clever-cloud.com";
    $user ="uf0gulncszpwfg3o"; 
    $password = "XkSQNAxhrorlhlx9Hrbm"; 


    $connection = mysqli_connect ( $host, $user, $password, $dbname );

    $objArticulos = new stdClass();
    $objArticulos->success = FALSE;

    if($connection){
        echo ("exito");
        $objArticulos->success = TRUE;
    }else{
        echo ("mal");
    }
?>
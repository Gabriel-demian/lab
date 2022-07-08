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
    
    $proyectos=[];
    
    $sql="select * from proyectos " ;
    
    $flag = 0;  

    if(($_GET['registro'])!="" or ($_GET['proyecto'])!="" or ($_GET['referente'])!="" 
    or ($_GET['pais'])!="" or ($_GET['inicio'])!="" or ($_GET['ingresos'])!=""){
        $sql = $sql . " WHERE ";
    }

    
    if (($_GET['registro'])!=""){ 
        $sql = $sql . "registro LIKE '%" . $_GET['registro'] . "%' ";
        $flag = 1;
    }

    if (($_GET['proyecto'])!=""){ 
        if($flag == 1){
            $sql = $sql . " and ";
        }
        $sql = $sql . "proyecto LIKE '%" . $_GET['proyecto'] . "%' ";
        $flag = 1;
    }

    if (($_GET['referente'])!=""){ 
        if($flag == 1){
            $sql = $sql . " and ";
        }
        $sql = $sql . "referente LIKE '%" . $_GET['referente'] . "%' ";
        $flag = 1;
    }

    if (($_GET['pais'])!=""){ 
        if($flag == 1){
            $sql = $sql . " and ";
        }
        $sql = $sql . "pais LIKE '%" . $_GET['pais'] . "%' ";
        $flag = 1;
    }

    if (($_GET['inicio'])!=""){ 
        if($flag == 1){
            $sql = $sql . " and ";
        }
        $sql = $sql . "inicio LIKE '%" . $_GET['inicio'] . "%' ";
        $flag = 1;
    }

    if (($_GET['ingresos'])!=""){ 
        if($flag == 1){
            $sql = $sql . " and ";
        }
        $sql = $sql . "ingresos LIKE '%" . $_GET['ingresos'] . "%' ";
        $flag = 1;
    }


    
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
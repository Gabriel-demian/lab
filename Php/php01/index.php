
<?php
    echo '<link rel="stylesheet" type="text/css" href="./estilo.css">';
    echo "<h4>Todo lo escrito fuera de las marcas php es entregado en la respuesta http sin pasar por el procesador php.</h4>
    <hr />
    <h4>Todo texto y/o html <span>entregado por el procesador php</span> usando la sentencia echo.</h4>
    <hr />";

    $miVariable = "valor1";
    echo "<h4>Sin usar concatenador <span> \$miVariable = </span>  " . $miVariable . "</h4>";
    echo "<h4>Usando concatenador <span> \$miVariable = </span>  " . $miVariable . "</h4>";

    echo "<hr />";

    define("MICONSTANTE","valorConstante");

    echo "<h4><span>\$miConstante</span> = " . MICONSTANTE . "</h4>";

    echo "<h4>Tipo de <span>\$miConstante</span> = " . gettype(MICONSTANTE) . "</h4>";

    echo "<hr />";

    echo "<h4>Arreglos</h4>";

    $aNombresPersona = ["Pedro", "Juan"];

    echo "<h4><span>\$aNombresPersona[0]</span> = " . $aNombresPersona[0] . "</h4>";
    echo "<h4><span>\$aNombresPersona[1]</span> = " . $aNombresPersona[1] . "</h4>";
    echo "<h4>Tipo de <span>\$aNombresPersona</span> = " . gettype($aNombresPersona) . "</h4>";

    array_push($aNombresPersona, "Maria");
    array_push($aNombresPersona, "Adrian");

    foreach($aNombresPersona as $varNombresPersona){
        echo "<li>" . $varNombresPersona . "</li>";
    }

    echo "<hr />";

    echo "<h4>Arreglo de dos dimensiones: </h4>";

    $a2Dimensiones[0] = array("Perros","Gatos","Caballos");
    $a2Dimensiones[1] = array("Bulldog","Persa","Arabe");
    $a2Dimensiones[2] = array("Labrador","Siames","Mustang");
    $a2Dimensiones[3] = array("Chihuahua","Esfinge","Shire");


    echo " <table ><tr>";
    echo "<td>" . $a2Dimensiones[0][0] . "</td>";
    echo "<td>" . $a2Dimensiones[0][1] . "</td>";
    echo "<td>" . $a2Dimensiones[0][2] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $a2Dimensiones[1][0] . "</td>";
    echo "<td>" . $a2Dimensiones[1][1] . "</td>";
    echo "<td>" . $a2Dimensiones[1][2] . "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>" . $a2Dimensiones[2][0] . "</td>";
    echo "<td>" . $a2Dimensiones[2][1] . "</td>";
    echo "<td>" . $a2Dimensiones[2][2] . "</td>";
    echo "</tr>";
    echo " <tr>";
    echo "<td>" . $a2Dimensiones[3][0] . "</td>";
    echo "<td>" . $a2Dimensiones[3][1] . "</td>";
    echo "<td>" . $a2Dimensiones[3][2] . "</td>";
    echo "</tr></table>";

    echo "<hr />";

    echo "<h4>Arreglo asociativos: </h4>";

    $renglonDeLiquidacion = ["legEmpleado"=>"c0001","Apellido"=>"Witt","salarioBasico"=>2000,"fechaIngr"=>"02/042019"];

    echo "<h4> legEmpleado = " . $renglonDeLiquidacion['legEmpleado'] . "</h4>";
    echo "<h4> Apellido = " . $renglonDeLiquidacion['Apellido'] . "</h4>";
    echo "<h4> salarioBasico = " . $renglonDeLiquidacion['salarioBasico'] . "</h4>";
    echo "<h4> fechaIngr = " . $renglonDeLiquidacion['fechaIngr'] . "</h4>";

    echo "<hr />";

    echo "<h4>Expresiones aritmeticas: </h4>";

    $x = 10;
    $y = 56;
    $z = ($x + $y);

    echo "<h4>La variable <span>\$x</span> tiene valor de = " . $x . "</h4>";

    echo "<h4>La variable <span>\$y</span> tiene valor de = " . $x . "</h4>";

    echo "<h4>La variable <span>\$x</span> es de tipo = " . gettype($x) . "</h4>";

    echo "<h4>La variable <span>\$y</span> es de tipo = " . gettype($x) . "</h4>";

    echo "<h4>Así se imprime una expresion aritmetica de suma (<span>\$x</span> + <span>\$y</span>) tiene valor de = " . $z . "</h4>";

    echo "<h4>Así se imprime una expresion aritmetica de una multiplicación (<span>\$x</span> * <span>\$y</span>) tiene valor de = " . ($x * $y) . "</h4>";

    echo "<h4>Así se imprime una expresion aritmetica de una division (<span>\$x</span> / <span>\$y</span>) tiene valor de = " . ($x / $y) . "</h4>";


?>
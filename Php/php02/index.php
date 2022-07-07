
<?php
    echo '<link rel="stylesheet" type="text/css" href="./estilo.css">';

    
    echo "<h4> En este ejemplo se utiliza la función include() que ubica codigo php definido en el archivo ejemplo.inc: </h4>";

    echo "<h4> Antes de insertar el include(), las variables declaradas no existen. </h4>";

    echo "<h4> Las variables son: </h4>";

    $a2Dimensiones[0] = array("Perros","Gatos","Caballos");
    $a2Dimensiones[1] = array("","","");
    $a2Dimensiones[2] = array("","","");
    $a2Dimensiones[3] = array("","","");

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

    echo "<br />";
    echo "<br />";
    echo "<br />";


    include("./ejemplo.php");


    $a2Dimensiones = $a2Dimensiones2;

    $total = 0;
    foreach($a2Dimensiones as $s)
    {
        $total = $total + count($s);
    }

    echo "<h4>La longitud del arreglo <span>\$a2Dimensiones</span> = " . $total . "</h4>";

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
?>
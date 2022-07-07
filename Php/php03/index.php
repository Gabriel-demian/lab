
<?php
    echo '<link rel="stylesheet" type="text/css" href="./estilo.css">';

    
    echo "<h4> En este ejemplo se utiliza la función include() que ubica codigo php definido en el archivo ejemplo.inc: </h4>";

    echo "<h4> Antes de insertar el include(), las variables declaradas no existen. </h4>";

    echo "<br />";
    
    echo "<h4> Las variables son: </h4>";

    $renglonDeLiquidacion = ["legEmpleado"=>"","Apellido"=>"","salarioBasico"=>0,"fechaIngr"=>""];

    echo "<h4> legEmpleado = " . $renglonDeLiquidacion['legEmpleado'] . "</h4>";
    echo "<h4> Apellido = " . $renglonDeLiquidacion['Apellido'] . "</h4>";
    echo "<h4> salarioBasico = " . $renglonDeLiquidacion['salarioBasico'] . "</h4>";
    echo "<h4> fechaIngr = " . $renglonDeLiquidacion['fechaIngr'] . "</h4>";

    echo "<br />";
    echo "<br />";

    require("./ejemplo.php");

    echo "<h4> Después de insertar el require(), las variables declaradas existen.   </h4>";

    $renglonDeLiquidacion = $renglonDeLiquidacion2;

    echo "<h4> legEmpleado = " . $renglonDeLiquidacion['legEmpleado'] . "</h4>";
    echo "<h4> Apellido = " . $renglonDeLiquidacion['Apellido'] . "</h4>";
    echo "<h4> salarioBasico = " . $renglonDeLiquidacion['salarioBasico'] . "</h4>";
    echo "<h4> fechaIngr = " . $renglonDeLiquidacion['fechaIngr'] . "</h4>";
?>
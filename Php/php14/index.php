<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Ejercicio 7 PHP</title>
        <script language="JavaScript">
        function pregunta(){
            if (confirm('¿Estas seguro de enviar este formulario?')){
            document.form.submit()
            }
        </script>
	</head>
	<header>
		<div class="primerCaja" id="box">
            <form name='form' action='./respuesta.php' method='GET' >
            
            <label for='dato'>Dato a encriptar: </label>
            <input type='text' name='dato' id='dato'><br><br>

            <button style='font: size 2em;color: red; background-color:black;' type='submit' onclick="pregunta()">Ingrese la informacion</button>
        </form>
		</div>
	</header>
	<body>
    </body>
</html>
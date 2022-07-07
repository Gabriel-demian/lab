$("#encriptar").click(function(){
    $("#resultado").empty();
    $("#resultado").addClass("estiloRecibiendo");
    $("#resultado").html("<h3>Esperando respuesta...</h3>");
    $("#estado").empty();
    $("#estado").append("<h3>Estado del requerimiento:</h3>");
    $.ajax({
        type: "POST",
        url: "./respuesta.php",
        data: {clave: $("#clave").val()},
        success: function(respuestaServer,estado){
            $("#resultado").removeClass("estiloRecibiendo");
            $("#resultado").html("<h3>Resultado:</h3><br />"+respuestaServer);
            $("#estado").append("<br /><p>"+estado+"</p>");
        }
    });
});
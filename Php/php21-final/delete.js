function elminarArticulo(registro){
    var confirmaEliminar = confirm("Esta seguro que deseea eliminar el articulo: " + registro + " ?");
    if (confirmaEliminar)
    {
        var request = $.ajax({
            type: "GET",
            url: "./delete.php",
            data: {registro: registro},
            success: function(respuestaDelServer,estado) {
                var objetoDato = JSON.parse(respuestaDelServer);
                console.log(objetoDato);
                PopUpMostrarMensaje(objetoDato.respuesta_estado, objetoDato.success);
                LlenarTabla(false);
            }//cierra funcion asignada al success
        });//cierra ajax
    }
}
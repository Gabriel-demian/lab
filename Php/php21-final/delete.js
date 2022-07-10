function elminarArticulo(registro){
    var confirmaEliminar = confirm("Esta seguro que deseea eliminar el articulo: " + registro + " ?");
    if (confirmaEliminar)
    {
        var request = $.ajax({
            type: "GET",
            url: "./delete.php",
            data: {registro: registro},
            success: function(respuestaDelServer,estado) {
                alert("registro "+registro+" fue eliminado");
                vaciarTabla();
                traerJson();
            }//cierra funcion asignada al success
        });//cierra ajax
    }
}
const 
    $registro = document.querySelector("#registro"),
    $proyecto = document.querySelector("#proyecto"),
    $referente = document.querySelector("#referente"),
    $pais = document.querySelector("#pais"),
    $inicio = document.querySelector("#inicio"),
    $ingresos = document.querySelector("#ingresos"),
    $orden = document.querySelector("#orden")
;
    
function vaciarTabla() {
    while($tabla.childNodes.length > 0) {
        $tabla.removeChild($tabla.childNodes[0]);
    }
}

function cambiarOrden(e) {
    $orden.value = e;
}

function traerJson() {

    console.log($orden.value);

    jQuery.ajax({
        type: "GET",
        url: "./database.php",
        data: { orden: $orden.value},
        success: function(respuestaDelServer) {
            var objJson=JSON.parse(respuestaDelServer);
            armarTabla(objJson);
        }//cierra funcion asignada al success
    });//cierra ajax

}

const $tabla = document.querySelector("#tabla");

function armarTabla(json) {
    vaciarTabla();
    json.proyectos.forEach(elemento => {
        let tr = document.createElement("tr"),

        tdRegistro = document.createElement("td"),
        tdProyecto = document.createElement("td"),
        tdReferente = document.createElement("td"),
        tdPais = document.createElement("td"),
        tdInicio = document.createElement("td"),
        tdIngresos = document.createElement("td");

        tdRegistro.innerHTML = elemento.registro;
        tr.appendChild(tdRegistro);

        tdProyecto.innerHTML = elemento.proyecto;
        tr.appendChild(tdProyecto);

        tdReferente.innerHTML = elemento.referente;
        tr.appendChild(tdReferente);

        tdPais.innerHTML = elemento.pais;
        tr.appendChild(tdPais);

        tdInicio.innerHTML = elemento.inicio;
        tr.appendChild(tdInicio);

        tdIngresos.innerHTML = elemento.ingresos;
        tr.appendChild(tdIngresos);

        $tabla.appendChild(tr);
    });

    document.getElementById("numRegistro").innerHTML = `Numero de registros: ${json.cuenta}`;
}


document.getElementById("cargar").addEventListener("click", ()=> traerJson());
document.getElementById("limpiar").addEventListener("click", ()=> vaciarTabla());
document.getElementById("registro").addEventListener("click", ()=> cambiarOrden("registro"));
document.getElementById("proyecto").addEventListener("click", ()=> cambiarOrden("proyecto"));
document.getElementById("referente").addEventListener("click", ()=> cambiarOrden("referente"));
document.getElementById("pais").addEventListener("click", ()=> cambiarOrden("pais"));
document.getElementById("inicio").addEventListener("click", ()=> cambiarOrden("inicio"));
document.getElementById("ingresos").addEventListener("click", ()=> cambiarOrden("ingresos"));


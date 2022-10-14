/**
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
    let datos = new FormData;
    datos.append("registro", $registro.value);
    datos.append("proyecto", $proyecto.value);
    datos.append("referente", $referente.value);
    datos.append("pais", $pais.value);
    datos.append("inicio", $inicio.value);
    datos.append("ingresos", $ingresos.value);
    datos.append("orden", $orden.value);
    
    fetch("database.php", {
        method: 'GET',
        body: datos
    }) 
    .then(alert(datos))
    .then(res => res.json() )
    .then(json => armarTabla(json))
    .catch(error => console.error('Error: ', error))
    .finally(()=> {
        setTimeout(()=>{},1500);
    })
}

const $tabla = document.querySelector("#tabla");

function armarTabla(json) {
    vaciarTabla();
    json.agentes.forEach(e => {
        let tr = document.createElement("tr"),

        tdRegistro = document.createElement("td"),
        tdProyecto = document.createElement("td"),
        tdReferente = document.createElement("td"),
        tdPais = document.createElement("td"),
        tdInicio = document.createElement("td"),
        tdIngresos = document.createElement("td");

        tdRegistro.innerHTML = e.registro;
        tr.appendChild(tdRegistro);

        tdProyecto.innerHTML = e.proyecto;
        tr.appendChild(tdProyecto);

        tdReferente.innerHTML = e.referente;
        tr.appendChild(tdReferente);

        tdPais.innerHTML = e.pais;
        tr.appendChild(tdPais);

        tdInicio.innerHTML = e.inicio;
        tr.appendChild(tdInicio);

        tdIngresos.innerHTML = e.ingresos;
        tr.appendChild(tdIngresos);

        $tabla.appendChild(tr);
    });

    document.getElementById("nRegistro").innerHTML = `Numero de registros: ${json.cantidad}`;
}


document.getElementById("cargar").addEventListener("click", ()=> traerJson());
document.getElementById("limpiar").addEventListener("click", ()=> vaciarTabla());
document.getElementById("registro").addEventListener("click", ()=> cambiarOrden("registro"));
document.getElementById("proyecto").addEventListener("click", ()=> cambiarOrden("proyecto"));
document.getElementById("referente").addEventListener("click", ()=> cambiarOrden("referente"));
document.getElementById("pais").addEventListener("click", ()=> cambiarOrden("pais"));
document.getElementById("inicio").addEventListener("click", ()=> cambiarOrden("inicio"));
document.getElementById("ingresos").addEventListener("click", ()=> cambiarOrden("ingresos"));

 */
function cargarVentanaModif(registro){

}




// Get the modal
var modal = document.getElementById("myModalEdit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeEdit")[0];

// When the user clicks the button, open the modal 
function modalEditar() {
  modal.style.display = "block";
  obtenerPaises(); // carga la lista de paises disponibles
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// boton Submit - Cargar nuevo articulo
$('#btnSubmitModif').click(function () {
  
  
  if (validarAlta()) {  // se deja como segunda validación
    EnviarProyModif();
  }
});


$('#btnLimpiar').click(function limpiarForm() {
  document.getElementById("alta_proyecto").value = "";
  document.getElementById("alta_referente").value = "";
  document.getElementById("alta_pais").value = "";
  document.getElementById("alta_fecha").value = "";
  document.getElementById("alta_ingresos").value = "";
});

function validarAlta() {
  const $proyecto = document.querySelector("#alta_proyecto"),
    $referente = document.querySelector("#alta_referente"),
    $pais = document.querySelector("#alta_pais"),
    $inicio = document.querySelector("#alta_fecha"),
    $ingresos = document.querySelector("#alta_ingresos");

  const $inicio2 = $inicio.value.split("-").join("-");

  if ($proyecto.value == "" || $referente.value == "" || $pais.value == "" || $inicio.value == "" || $ingresos.value == "") {
    return false;
  }
  else {
    document.getElementById('btnSubmit').disabled = false;// si todos los campos tienen datos entonces se habilita el botón de alta
    return true;
  }
}

function EnviarProyModif() {

  // return false
  var confirmaAlta = confirm("Esta seguro que deseea modificar el proyecto ?");

  if (confirmaAlta) {
    const $registro = document.querySelector("#edit_registro"),
      $proyecto = document.querySelector("#edit_proyecto"),
      $referente = document.querySelector("#edit_referente"),
      $pais = document.querySelector("#edit_pais"),
      $inicio = document.querySelector("#edit_fecha"),
      $ingresos = document.querySelector("#edit_ingresos");

    const $inicio2 = $inicio.value.split("-").join("-");

    var request = $.ajax({
      type: "POST",
      url: "./alta.php",
      // processData: false,
      // contentType: false,
      // cache: false,
      data: {
        registro: $registro.value,
        proyecto: $proyecto.value,
        referente: $referente.value,
        pais: $pais.value,
        inicio: $inicio2,
        ingresos: $ingresos.value
      },
      success: function (respuestaDelServer, estado) {
        console.log(respuestaDelServer, estado);
        alert(respuestaDelServer);
        // var objetoDato = JSON.parse(respuestaDelServer);
        // alert("NUEVO PROYECTO DADO DE ALTA!");
        traerJson();
      },
      error: function (respuestaDelServer, estado) {
        console.log(respuestaDelServer, estado);
        // alert("ERROR");
      }//cierra funcion asignada al success
    });//cierra ajax
  }
}

function obtenerPaises(){
  var listaPaises;

  jQuery.ajax({
    type: "GET",
    url: "./listaPaises.php",
    success: function(respuestaDelServer) {
        listaPaises = JSON.parse(respuestaDelServer);
        cargarOpciones(listaPaises)
    }
  });
}

function cargarOpciones(listaPaises){
  
  var newOpt;
  //cargar opciones para paises de ventana modal
  listaPaises.paises.forEach(element => {
      newOpt = document.createElement("option");

      newOpt.setAttribute("value", element.pais);
      
      if( parseInt(element.pais) == 0 ){
          newOpt.setAttribute("selected", true);
      }
      newOpt.innerHTML = newOpt.value;

      document.getElementById("edit_pais").appendChild(newOpt);   
  });
}


document.getElementById("edit_proyecto").onkeyup = () => validarAlta();
document.getElementById("edit_referente").onkeyup = () => validarAlta();
document.getElementById("edit_pais").onkeyup = () => validarAlta();
document.getElementById("edit_fecha").onkeyup = () => validarAlta();
document.getElementById("edit_ingresos").onkeyup = () => validarAlta();


// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("alta");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function () {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal.style.display = "none";
}

// boton Submit - Cargar nuevo articulo
$('#btnSubmit').click(function () {
  if (validarAlta()) {  // se deja como segunda validación
    EnviarNuevoProy();
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
      console.log($inicio2);

  if ($proyecto.value == "" || $referente.value == "" || $pais.value == "" || $inicio.value == "" || $ingresos.value == "") {
    return false;
  }
  else {
    document.getElementById('btnSubmit').disabled = false;// si todos los campos tienen datos entonces se habilita el botón de alta
    return true;
  }
}

function EnviarNuevoProy() {

  var confirmaAlta = confirm("Esta seguro que deseea añadir el neuvo proyecto ?");

  if (confirmaAlta) {
    const $proyecto = document.querySelector("#alta_proyecto"),
      $referente = document.querySelector("#alta_referente"),
      $pais = document.querySelector("#alta_pais"),
      $inicio = document.querySelector("#alta_fecha"),
      $ingresos = document.querySelector("#alta_ingresos");

      const $inicio2 = $inicio.value.split("-").join("-");
      console.log($inicio2);

      var request = $.ajax({
        type: "POST",
        url: "./alta.php",
        processData: false,
        contentType: false,
        cache: false,
        data: {
          proyecto: $proyecto.value,
          referente: $referente.value,
          pais: $pais.value,
          inicio: $inicio2,
          ingresos: $ingresos.value
        },
      success: function (respuestaDelServer, estado) {
        var objetoDato = JSON.parse(respuestaDelServer);
        console.log(respuestaDelServer);
        alert("NUEVO PROYECTO DADO DE ALTA!");
      },
      error: function (respuestaDelServer, estado){
        alert("ERROR");
      }//cierra funcion asignada al success
    });//cierra ajax
  }
}


document.getElementById("alta_proyecto").onkeyup = () => validarAlta();
document.getElementById("alta_referente").onkeyup = () => validarAlta();
document.getElementById("alta_pais").onkeyup = () => validarAlta();
document.getElementById("alta_fecha").onkeyup = () => validarAlta();
document.getElementById("alta_ingresos").onkeyup = () => validarAlta();
function cargarVentanaModif(elemento){
  console.log(elemento);
  document.querySelector("#edit_registro").value = elemento.querySelector('[name="registro"]').innerHTML;
  document.querySelector("#edit_proyecto").value = elemento.querySelector('[name="proyecto"]').innerHTML;
  document.querySelector("#edit_referente").value = elemento.querySelector('[name="referente"]').innerHTML;
  document.querySelector("#edit_pais").value = elemento.querySelector('[name="pais"]').innerHTML;
  document.querySelector("#edit_fecha").value = elemento.querySelector('[name="inicio"]').innerHTML;
  document.querySelector("#edit_ingresos").value = elemento.querySelector('[name="ingresos"]').innerHTML;
}

// Get the modal
var modal2 = document.getElementById("myModalEdit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closeEdit")[0];

// When the user clicks the button, open the modal 
function modalEditar() {
  modal2.style.display = "block";
  obtenerPaisesModif(); // carga la lista de paises disponibles
}

// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal2.style.display = "none";
}

// boton Submit - Cargar nuevo articulo
$('#btnSubmitModif').click(function () {
  if (validarEdit()) {  // se deja como segunda validación
    EnviarProyModif();
  }
});


$('#btnLimpiar').click(function limpiarForm() {
  document.getElementById("edit_proyecto").value = "";
  document.getElementById("edit_referente").value = "";
  document.getElementById("edit_pais").value = "";
  document.getElementById("edit_fecha").value = "";
  document.getElementById("edit_ingresos").value = "";
});

function validarEdit() {
  const $proyecto = document.querySelector("#edit_proyecto"),
    $referente = document.querySelector("#edit_referente"),
    $pais = document.querySelector("#edit_pais"),
    $inicio = document.querySelector("#edit_fecha"),
    $ingresos = document.querySelector("#edit_ingresos");

  const $inicio2 = $inicio.value.split("-").join("-");

  if ($proyecto.value == "" || $referente.value == "" || $pais.value == "" || $inicio.value == "" || $ingresos.value == "") {
    return false;
  }
  else {
    document.getElementById('btnSubmitModif').disabled = false;// si todos los campos tienen datos entonces se habilita el botón de modificación
    return true;
  }
}

function EnviarProyModif() {

  // return false
  var confirmaModi = confirm("Esta seguro que deseea modificar el proyecto ?");

  if (confirmaModi) {
    const $registro = document.querySelector("#edit_registro"),
      $proyecto = document.querySelector("#edit_proyecto"),
      $referente = document.querySelector("#edit_referente"),
      $pais = document.querySelector("#edit_pais"),
      $inicio = document.querySelector("#edit_fecha"),
      $ingresos = document.querySelector("#edit_ingresos");

    const $inicio2 = $inicio.value.split("-").join("-");

    var request = $.ajax({
      type: "POST",
      url: "./edit.php",
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
        console.log("EDIITTT!!!");
        console.log(respuestaDelServer, estado);
        alert(respuestaDelServer);
        // var objetoDato = JSON.parse(respuestaDelServer);
        traerJson();
      },
      error: function (respuestaDelServer, estado) {
        console.log("EDIITTT!!!");
        console.log(respuestaDelServer, estado);
        // alert("ERROR");
      }//cierra funcion asignada al success
    });//cierra ajax
  }
}

function obtenerPaisesModif(){
  var listaPaises;

  jQuery.ajax({
    type: "GET",
    url: "./listaPaises.php",
    success: function(respuestaDelServer) {
        listaPaises = JSON.parse(respuestaDelServer);
        cargarOpcionesModif(listaPaises)
    }
  });
}

function cargarOpcionesModif(listaPaises){
  
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


document.getElementById("edit_proyecto").onkeyup = () => validarEdit();
document.getElementById("edit_referente").onkeyup = () => validarEdit();
document.getElementById("edit_pais").onkeyup = () => validarEdit();
document.getElementById("edit_fecha").onkeyup = () => validarEdit();
document.getElementById("edit_ingresos").onkeyup = () => validarEdit();

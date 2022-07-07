fetch("../unidades.json")
.then(response => {
   return response.json();
}).then(jsondata => {
   const $contenedorSelect = document.getElementById("unidades");

   for (let i = 0; i < jsondata.unidadesDeMedida.length; i++) {
      const $option = document.createElement("option");
      $option.value = jsondata.unidadesDeMedida[i].codUm;
      $option.innerText = jsondata.unidadesDeMedida[i].descripcionUm;
      $contenedorSelect.appendChild($option);
      console.log(jsondata.unidadesDeMedida[i]);
   }
} );


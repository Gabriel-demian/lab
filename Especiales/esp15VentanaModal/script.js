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

document.getElementById("abrir").onclick = ()=> {
   const $modal = document.getElementById("modal"),
   $contenido = document.getElementById("contenido");
   $modal.classList.remove("none");
   $contenido.classList.add("desactivo");
}

document.getElementById("cerrar").onclick = ()=> {
   const $modal = document.getElementById("modal"),
   $contenido = document.getElementById("contenido");
   $modal.classList.add("none");
   $contenido.classList.remove("desactivo");
}
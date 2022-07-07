const $contenedorCuerpo = document.getElementById("cuerpoTabla");


document.getElementById("vaciar").onclick = ()=> {
   while($contenedorCuerpo.childNodes.length > 0) {
      $contenedorCuerpo.removeChild($contenedorCuerpo.childNodes[0]);
   }
}

document.getElementById("cargar").onclick = ()=> {
   fetch("../articulos.json")
   .then(response => {
      return response.json();
   })
   .then(jsondata => {
      if($contenedorCuerpo.childNodes.length <= 0){
         for (let i = 0; i < jsondata.articulos.length; i++) {
            const $tr = document.createElement("tr");
            let texto = "<td>" + jsondata.articulos[i].codArt + "</td>";
            texto = texto + "<td class='nombre'>" + jsondata.articulos[i].familia + "</td>";
            texto = texto + "<td>" + jsondata.articulos[i].descripcion + "</td>";
            texto = texto + "<td class='sueldo'>" + jsondata.articulos[i].um + "</td>";
            $tr.innerHTML = texto;
            $contenedorCuerpo.appendChild($tr);
         }
      }
   } );
}


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
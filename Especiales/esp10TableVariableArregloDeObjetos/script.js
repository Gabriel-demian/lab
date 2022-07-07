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
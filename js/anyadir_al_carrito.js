$(function(){
     //Botón de añadir al carrito
     $("#comprar").click(function(){
          $("#respuesta").load("anyadir_al_carrito.php","id="+getParametroUrl("id"));
     });
     
     //Botón de quitar del carrito
     $(".remover").click(function(){
          //Hacemos la llamada a ajax mediante jquery
          $.ajax({url: "remover_del_carrito.php", data: "id="+this.id, success: function(responseTxt){
               var r = JSON.parse(responseTxt);
               $("#respuesta").text(r.respuesta);
               
               //Si la cantidad resultante del producto es 0, se quita la fila de la tabla CAMBIARLO PARA QU SE MUESTRE BIEN
               if(r.cantidad == 0){
                    $("tr #"+this.id).remove();
               }
          }});
     })
});

//Función que busca un parámeto get de la de url
function getParametroUrl (param) {
    var url = decodeURIComponent(window.location.search.substring(1)),
        variables = url.split('&'),
        nombre_parametro,
        i;

    for (i = 0; i < variables.length; i++) {
        nombre_parametro = variables[i].split('=');

        if (nombre_parametro[0] === param) {
            return nombre_parametro[1] === undefined ? true : nombre_parametro[1];
        }
    }
};

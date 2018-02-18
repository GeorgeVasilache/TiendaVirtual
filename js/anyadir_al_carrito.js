$(function(){
     //Botón de añadir al carrito
     $("#comprar").click(comprar);
     
     //Botón de quitar del carrito
     $(".remover").click(remover);
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

function comprar (){
          $("#respuesta").load("carrito/anyadir_al_carrito.php","id="+getParametroUrl("id"));
}

function remover (){
          //Hacemos la llamada a ajax mediante jquery
          $.ajax({url: "remover_del_carrito.php", data: "id="+this.id, success: function(responseTxt){
               
               var r = JSON.parse(responseTxt);
               $("#respuesta").html(r.respuesta);
               
               //Si la cantidad resultante del producto es 0, se quita la fila de la tabla
               if(r.cantidad == 0){
                    $("#r"+r.id).remove();
                    $("#total").text(r.total+"€");
                    
                    //Si después de esto no quedan elementos en la tabla, se redirigirá al index
                    
                    if ($('table tr').length == 2) window.location.replace("/TiendaVirtual/index.php");
                    
               }
               else{
                    //Seleccionamos las filas correspondientes y actualizamos los datos
                    $("#r"+r.id+" td:nth-child(5)").text(r.cantidad);
                    $("#r"+r.id+" td:nth-child(6)").text(r.precio+"€");
                    $("#total").text(r.total+"€");
               }
          }});
     }
$(function(){
     $("#comprar").click(function(){
          $("#respuesta").load("anyadir_al_carrito.php","id="+getParametroUrl("id"));
     });
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

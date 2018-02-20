<?php //Función utilizada para imprimir las cartas con los productos indicados

function imprimirCartas ($productos_extra){
        
        echo "<div class='row'>" ;
        foreach($productos_extra as $producto){
            
            echo    "<div class='col-lg-4 col-md-6 mb-4'>
                              <div class='card h-100'>
                                <a href='producto.php?id={$producto["id"]}'><img class='card-img-top carta' src='{$producto["img"]}'></a>
                                <div class='card-body'>
                                  <h4 class='card-title'>
                                    <a href='producto.php?id={$producto["id"]}'>{$producto["nombre"]}</a>
                                  </h4>
                                  <h5>{$producto["precio"]}€</h5>
                                  <p class='card-text'>{$producto["descripcion"]}</p>
                                </div>
                                <div class='card-footer'>
                                  <small class='text-muted'>★ ★ ★ ★ ☆</small>
                                </div>
                              </div>
                        </div>";
        }
        echo "</div>";
    }

?>
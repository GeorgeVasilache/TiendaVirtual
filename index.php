<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Controlador
    require_once("inicio_sesion.php");
    
    $titulo = "Tienda virtual de George";
    
    //Si se acaban de registrar, y llega el parámetro r, saldrá un texto indicando que ya se puede iniciar sesión
    if($_GET["r"] == 1) $msjRegistro = "<span class='text-success ml-5'>Registro completado, ahora puede iniciar sesión</span>";
    
    // MOSTRAR PRODUCTOS
    
    //cogemos los productos de la base de datos para mostrarlos
    $productos = listarProductos();
    
    //los 3 primeros productos los usaremos para mostrarlos en las slides
    $productos_slide[] = $productos[0];
    $productos_slide[] = $productos[1];
    $productos_slide[] = $productos[2];
    
    //el resto de productos serán mostrados en las cartas de abajo
    for($i = 3 ; $i < count($productos) ; $i++){
        $productos_extra[] = $productos[$i];
    }
    
    function imprimirCartas($productos_extra){
        
        echo "<div class='row'>" ;
        foreach($productos_extra as $producto){
            
            echo    "<div class='col-lg-4 col-md-6 mb-4'>
                              <div class='card h-100'>
                                <a href='producto.php?id={$producto["id"]}'><img class='card-img-top' src='{$producto["img"]}'></a>
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
    
    //Vista
    require_once("vista/plantilla.php");
    require_once("vista/vista_index.php");
    require_once("vista/plantilla_footer.php");
?>
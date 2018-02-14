<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Funciones útiles genereles
    require_once("util.php");
    
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
    
    //Vista
    require_once("vista/plantilla.php");
    require_once("vista/vista_index.php");
    require_once("vista/plantilla_footer.php");
?>
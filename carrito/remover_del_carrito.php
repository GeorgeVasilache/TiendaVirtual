<?php
    //Clases
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Carrito.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
    
    //Controlador
    
    session_start();
    
    //Cogemos el producto en cuestión
    $producto = $_SESSION["carrito"]->getProducto($_GET["id"]);
    
    //Comprobamos cuántas unidades hay en el carrito, si hay más de 1 se cdogen los datos directamente del producto
    if($producto->getCantidad() > 1){
        $_SESSION["carrito"]->quitarProducto($_GET["id"]);
        $restante = $producto->getCantidad();
        $precio = $producto->getTotal();
    }
    else{
        $_SESSION["carrito"]->quitarProducto($_GET["id"]);
        $restante = 0;
        $precio = 0;
    }
    
    //Cogemos el total del carrito una vez realizado el cambio
    $total = $_SESSION["carrito"]->getTotal();
    
    //Si el carrito se queda vacío después de eliminar el producto, se destruye
    if(count($_SESSION["carrito"]->getProductos()) == 0) session_destroy();
    
    //La respuesta está compuesta por una cadena que se mostrará y la cantidad restante en el carrito después de remover el producto
    echo ('{
        "id":'.$_GET["id"].',
        "respuesta": "<span class=\"text-success\">Producto eliminado</span>",
        "cantidad":'.$restante.',
        "precio":'.$precio.',
        "total":'.$total.'}'
        );
    
?>
     
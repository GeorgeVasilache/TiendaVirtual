<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Controlador
    
    session_start();
    
    //Cantidad resultante después de quitar un producto
    $restante = $_SESSION["carrito"]->getProducto($_GET["id"])->getCantidad()-1; 
    
    //Quitamos el producto
    $_SESSION["carrito"]->quitarProducto($_GET["id"]);
    
    //La respuesta está compuesta por una cadena que se mostrará y la cantidad restante en el carrito después de remover el producto
    echo ('{ "respuesta":"Producto eliminado", "cantidad":'.$restante.'}');

    
?>
     
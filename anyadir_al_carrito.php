<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Controlador
    
    require_once("inicio_sesion.php");
    
    session_start();
    
    //Si no existe la variable de sesión carrito, se crea
    if(!isset($_SESSION["carrito"])){
        $_SESSION["carrito"] = new Carrito();
    }
    
    //Se crea un producto
    $producto = new Producto($_GET["id"]);
    
    //Se añade el producto creado al carrito
    $_SESSION["carrito"]->anyadirProducto($producto);
    
    //Por último redirigimos a la página anterior
    
    header("Location: ". $_SERVER["HTTP_REFERER"]);
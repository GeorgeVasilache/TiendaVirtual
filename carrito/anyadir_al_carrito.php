<?php
    //Clases
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Carrito.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
    
    //Controlador
    
    session_start();
    
    //Si no existe la variable de sesión carrito, se crea
    if(!isset($_SESSION["carrito"])){
        $_SESSION["carrito"] = new Carrito();
    }
    
    //Buscamos el producto en el carrito
    if($producto = $_SESSION["carrito"]->getProducto($_GET["id"])){
        
        //Se comprueba cuántas unidades del producto hay en el carrito, y si igualan el stock, no se añaden más
        if($producto->getCantidad() < $producto->getStock() ){
        
            //Se crea un producto
            $producto = new Producto($_GET["id"]);
            
            //Se añade el producto creado al carrito
            $_SESSION["carrito"]->anyadirProducto($producto);
            
            //Por último devolvemos una respuesta
            
            echo "<span class='text-success'>Producto añadido({$_SESSION["carrito"]->getProducto($_GET["id"])->getCantidad()})</span>";
        }
        else{
            echo "<span class='text-danger'>No hay suficiente stock</span>";
        }
    }
    else{
        //Se crea un producto
            $producto = new Producto($_GET["id"]);
            
            //Se añade el producto creado al carrito
            $_SESSION["carrito"]->anyadirProducto($producto);
            
            //Por último devolvemos una respuesta
            
            echo "<span class='text-success'>Producto añadido({$_SESSION["carrito"]->getProducto($_GET["id"])->getCantidad()})</span>";
    }
     
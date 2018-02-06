<?php
    //Clases
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Carrito.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
    
    //Controlador
    
    require_once("inicio_sesion.php");
    
    $titulo = "Carrito de la Compra";
    
    session_start();
            
    if(!isset($_SESSION["carrito"])){
        
        //Si no está creado, se crea el carrito
        $_SESSION["carrito"] = new Carrito();
        
        $producto1 = new Producto(1);
        $producto2 = new Producto(1);
        $producto3 = new Producto(1);
        $producto4 = new Producto(2);
        $producto5 = new Producto(2);
        

        $_SESSION["carrito"]->anyadirProducto($producto1);
        $_SESSION["carrito"]->anyadirProducto($producto2);
        $_SESSION["carrito"]->anyadirProducto($producto3);
        $_SESSION["carrito"]->anyadirProducto($producto4);
        $_SESSION["carrito"]->anyadirProducto($producto5);
        
        $_SESSION["carrito"]->calcularTotal();
    }
    function mostrarCarrito(){
        $productos = $_SESSION["carrito"]->getProductos();
        
        //imprmimos la tabla con los datos de los productos del carrito
        echo "<div class='container'><table class='table table-striped'><tr><th> Nombre </th><th>Descripción</th><th>Categoría</th><th>Cantidad</th><th>Precio</th>";
        foreach($productos as $producto){
            
            echo "<tr><td>{$producto->getNombre()}</td>";
            echo "<td>{$producto->getDesc()}</td>";
            echo "<td>{$producto->getCat()}</td>";
            echo "<td>{$producto->getCantidad()}</td>";
            echo "<td>{$producto->getTotal()}€</td>";
        }
        echo "<tr><td></td><td></td><td></td><th>TOTAL:</th><th>{$_SESSION["carrito"]->getTotal()}€</th></tr>";
        echo "</table></div>";
        
        echo "<button type='button' class='btn btn-lg btn-primary'>Finalizar Compra</button>";
    }
    
    //Vista
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/vista/vista_carrito.php");

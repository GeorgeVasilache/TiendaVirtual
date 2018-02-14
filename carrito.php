<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Controlador
    
    require_once("inicio_sesion.php");
    
    $titulo = "Carrito de la Compra";
    
    session_start();
            
    if(!isset($_SESSION["carrito"])){
        
        header("Location: index.php");
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
        echo "<tr><td></td><td></td><td></td><th>TOTAL:</th><th>".$_SESSION["carrito"]->getTotal()."€</th></tr>";
        echo "</table></div>";
        
        echo "<button type='button' class='btn btn-lg btn-primary'>Finalizar Compra</button>";
    }
    
    //Vista
    require_once("carrito/vista/vista_carrito.php");

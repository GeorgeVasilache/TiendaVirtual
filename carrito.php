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
        
        //imprimimos la tabla con los datos de los productos del carrito
        echo "<div class='container my-4'><table class='table table-striped'><tr class='row'><td class='col-1'></td><th class='col-1'> Nombre </th><th class='col-5'>Descripción</th><th class='col-2'>Categoría</th><th class='col-2'>Cantidad</th><th class='col-1'>Precio</th>";
        foreach($productos as $producto){
            
            echo "<tr class='row'><td class='col-1'> <img class='img-fluid'src='{$producto->getImg()}'/> </td>";
            echo "<td class='col-1'> {$producto->getNombre()} </td>";
            echo "<td class='col-5'> {$producto->getDesc()} </td>";
            echo "<td class='col-2'> %{$producto->getCat()}% </td>";
            echo "<td class='col-2'> {$producto->getCantidad()} </td>";
            echo "<td class='col-1'> {$producto->getTotal()}€ </td>";
        }
        echo "<tr class='row'><td class='col-1'></td><td class='col-1'></td><td class='col-5'></td><td class='col-2'></td></td><th class='col-2'>TOTAL:</th><th class='col-1'>".$_SESSION["carrito"]->getTotal()."€</th></tr>";
        echo "</table>";
        
        echo "<a href='confirmar_compra.php' class='btn btn-lg btn-primary'>Finalizar Compra</a></div>";
    }
    
    //Vista
    require_once("carrito/vista/vista_carrito.php");

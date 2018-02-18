<?php
    //Clases
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Carrito.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
    
    //Controlador
    
    require_once("/home/ubuntu/workspace/TiendaVirtual/inicio_sesion.php");
    
    $titulo = "Carrito de la Compra";
    
    session_start();
    
    //Si no existe el carrito, se redirige a la página principal
    if(!isset($_SESSION["carrito"]) || count($_SESSION["carrito"]->getProductos()) == 0){
        
        header("Location: /TiendaVirtual/index.php");
    }
    
    function mostrarCarrito(){
        $productos = $_SESSION["carrito"]->getProductos();
        
        //imprimimos la tabla con los datos de los productos del carrito
        echo "<div class='container my-4'>
                <table class='table table-striped'>
                    <tr class='row'>
                        <td class='col-1'></td>
                        <th class='col-1'> Nombre </th>
                        <th class='col-5'>Descripción</th>
                        <th class='col-2'>Categoría</th>
                        <th class='col-1'>Cantidad</th>
                        <th class='col-1'>Precio</th>
                    </tr>";
        foreach($productos as $producto){
            
            echo "<tr class='row' id='r{$producto->getID()}'><td class='col-1'> <img class='img-fluid'src='{$producto->getImg()}'/> </td>";
            echo "<td class='col-1'> {$producto->getNombre()} </td>";
            echo "<td class='col-5'> {$producto->getDesc()} </td>";
            echo "<td class='col-2'> %{$producto->getCat()}% </td>";
            echo "<td class='col-1'> {$producto->getCantidad()} </td>";
            echo "<td class='col-1'> {$producto->getTotal()}€ </td>";
            echo "<td><button type='button' class='btn btn-warning remover' id='{$producto->getId()}'><i class='material-icons'>delete</i></button></td>";
        }
        echo "<tr class='row'><td class='col-1'></td><td class='col-1'></td><td class='col-5'></td><td class='col-2'></td></td><th class='col-2'>TOTAL:</th><th class='col-1' id='total'>".$_SESSION["carrito"]->getTotal()."€</th></tr>";
        echo "</table>";
        
        echo "<a href='confirmar_compra.php' class='btn btn-lg btn-primary'>Finalizar Compra</a></div>";
    }
    
    //Vista
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/vista/vista_carrito.php");

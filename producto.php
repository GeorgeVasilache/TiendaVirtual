<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Funciones útiles genereles
    
    //Controlador
    require_once("inicio_sesion.php");
    
    //Cogemos los datos del producto que queremos mostrar
    $producto = sacarProducto($_GET["id"]);
    
    $titulo = $producto["nombre"];
    
    //Si hay stock suficiente y si hay una sesión abierta, se muestra el botón de añadir al carrito
    if ($producto["stock"] > 0 ){
        $disponibilidad = "success"; 
        
        if(sesionAbierta())
            $comprar = "<a class='btn btn-success carrito ml-4' href='anyadir_al_carrito.php?id={$producto["id"]}'><i class='material-icons text-dark'>add_shopping_cart</i></a>";
        else
            $comprar = "<span class='text-warning display-4'>Debe iniciar sesión para poder comprar</span>";
    } 
    else{
        $disponibilidad = "danger";
        $comprar = "";
    }
    
    // MOSTRAR PRODUCTO
    
    //Vista
    require_once("vista/plantilla.php");
    require_once("vista/vista_producto.php");
    require_once("vista/plantilla_footer.php");
?>
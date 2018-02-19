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
    
    //Cogemos los datos del producto que queremos mostrar
    $producto = sacarProducto($_GET["id"]);
    
    $titulo = $producto["nombre"];
    
    //Si hay stock suficiente y si hay una sesión abierta, se muestra el botón de añadir al carrito
    if ($producto["stock"] > 0 ){
        $disponibilidad = "success"; 
        
        if(sesionAbierta())
            $comprar = "<button id='comprar' class='btn btn-success carrito m-4'>Añadir al carrito </button>";
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
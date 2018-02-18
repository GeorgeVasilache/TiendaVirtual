<?php
    //Clases
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Carrito.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
    
    //Controlador
    
    session_start();
    
    //Si no existe la variable de sesión carrito, se redirige a la página principal
    if(!isset($_SESSION["carrito"])){
        header("Location: index.php");
        exit();
    }
    
    require_once("/home/ubuntu/workspace/TiendaVirtual/inicio_sesion.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla.php");
    
    //Llamamos a la función para que cree el pedido y lo registre en la base de datos, pasándole el carrito y la id del usuario
    if(confirmarCompra($_SESSION["carrito"], $_COOKIE["id"])){
        
        //Si la compra se realiza con éxito el carrito se destruye
        $exito = "<h1 class='display-4 text-success'>Compra finalizada con éxito!</h1>";
        session_destroy();
    }
    else
        $exito = "<h1 class='display-4 text-danger'>Error al procesar el pedido</h1>";
        
    require_once("/home/ubuntu/workspace/TiendaVirtual/vista/compra_finalizada.php");
    require_once("/home/ubuntu/workspace/TiendaVirtual/vista/plantilla_footer.php")
?>
     
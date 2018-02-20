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
    
    $titulo = "Productos";
    
    //Generamos el nombre de la categoría seleccionada
    switch($_GET["cat"]){
        case "l" : $categoria = "Libros de Rol"; break;
        case "m" : $categoria = "Magic the Gathering"; break;
        case "j" : $categoria = "Juegos de mesa"; break;
    }
    
    // MOSTRAR PRODUCTOS
    
    //Cogemos los productos de la categoría indicada en la url para mostrarlos
    $productos = listarProductosPorCategoria($_GET["cat"]);
    
    //Vista
    require_once("vista/plantilla.php");
    require_once("vista/vista_productos.php");
    require_once("vista/plantilla_footer.php");
?>
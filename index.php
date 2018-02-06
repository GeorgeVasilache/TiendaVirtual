<?php
    //Clases
    require_once("carrito/Carrito.php");
    require_once("carrito/Producto.php");
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Controlador
    require_once("inicio_sesion.php");
    
    $titulo = "Tienda virtual de George";
    
    if($_GET["r"] == 1) $msjRegistro = "<span class='text-success ml-5'>Registro completado, ahora puede iniciar sesión</span>";
    
    //Vista
    require_once("vista/plantilla.php");
    require_once("vista/plantilla_footer.php");
?>
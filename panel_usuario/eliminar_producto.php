<?php
            require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
            require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Carrito.php");
            require_once("/home/ubuntu/workspace/TiendaVirtual/carrito/Producto.php");
            
            //Si el producto eliminado está en el carrito, también se elimina del mismo
            
            session_start();
            $_SESSION["carrito"]->eliminarProducto($_GET["eliminar"]);
            
            //Si después de esto el carrito se queda vacío, se destruye
            if (count($_SESSION["carrito"]-> getProductos()) == 0) session_destroy();
            
            eliminarProducto($_GET["eliminar"]);
                         
            header ( "Location: /TiendaVirtual/panel_usuario/panel_usuario.php");
            exit;
   
?>
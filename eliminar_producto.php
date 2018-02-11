<?php
            require_once("modelo/acceso.php");
            
            eliminarProducto($_GET["eliminar"]);
                         
            header ( "Location: panel_usuario.php");
            exit;
   
?>
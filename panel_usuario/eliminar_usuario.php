<?php
         require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
         
         //aquí se encuentra la función cerrarSesion()
         require_once("/home/ubuntu/workspace/TiendaVirtual/inicio_sesion.php");
         
          eliminarUsuario($_GET["u"]);
          borrarCookie();
                         
          header ("Location: ../index.php");
          exit;

?>
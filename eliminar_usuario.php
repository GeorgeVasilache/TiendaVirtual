<?php
         require_once("modelo/acceso.php");
         
         //aquí se encuentra la función cerrarSesion()
         require_once("inicio_sesion.php");
         
          eliminarUsuario($_GET["u"]);
          cerrarSesion();
                         
          header ( "Location: index.php");
          exit;


?>
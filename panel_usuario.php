<?php
    //acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //módulo de inicio de sesión
    require_once("inicio_sesion.php");
    
    //El admin tiene la id 16 en la base de datos
    if($_COOKIE["id"] == "16"){
      $titulo = "Panel del administrador";
      
      //Si se acaba de añadir un producto nuevo, saldrá un mensaje
      if($_GET["nuevo"] == 1) $msj_produco_nuevo = "<span class='text-success ml-2'>Producto añadido con éxito</span>";
      if($_GET["nuevo"] == 0) $msj_produco_nuevo = "<span class='text-danger ml-2'>Error al añadir producto</span>";
      
      //vista del panel del administrador
      require_once("panel_usuario/vista/vista_panel_admin.php");
    } 
    else{
      $titulo = "Panel de usuario";
      
      //vista del panel de usuario
      require_once("panel_usuario/vista/vista_panel_usuario.php");
    }
?>
<?php
    
    //Acceso a la base de datos
    require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
    
    //Controlador
    
    require_once("/home/ubuntu/workspace/TiendaVirtual/inicio_sesion.php");
    
    $titulo = "Registro";
    
    if(isset($_GET["email"])){
        //Comprobamos que no haya ningún usuario con el mismo nick ya registrado en la base de datos. No se registrará si ya existe el nick en la base de datos
        //Si se registra, se redirige a la página principal, y sino, de vuelva al formulario de registro con un mensaje de error
        if (comprobarDisponibilidad($_GET["nick"]) !== false){
            registrarUsuario($_GET["email"], $_GET["nick"], $_GET["pass"], $_GET["nombre"], $_GET["apellidos"], $_GET["dir"], $_GET["tlf"]);
            header("Location: /TiendaVirtual/index.php?r=1");
            exit;
        }
        else header("Location: /TiendaVirtual/registro/registro.php?x=1");
    }
    else{
        if($_GET["x"] == 1) $msj = "<span class='text-danger'>Usuario no disponible</span>";
        require_once("/home/ubuntu/workspace/TiendaVirtual/registro/vista_registro.php");  
    } 
?>
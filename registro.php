<?php
    
    //Acceso a la base de datos
    require_once("modelo/acceso.php");
    
    //Controlador
    
    require_once("inicio_sesion.php");
    
    $titulo = "Registro";
    
    if(isset($_GET["email"])){
        //comprobamos que no haya ningún usuario con el mismo nick ya registrado en la base de datos
        if (comprobarDisponibilidad($_GET["nick"]) !== false){
            registrarUsuario($_GET["email"], $_GET["nick"], $_GET["pass"], $_GET["nombre"], $_GET["apellidos"], $_GET["dir"], $_GET["tlf"]);
            header("Location: index.php?r=1");
            exit;
        }
        else echo "Usuario no disponible";
    }
    else require_once("registro/vista_registro.php");
?>
<?php
            require ('/usr/share/php/nusoap/nusoap.php');
            require_once("modelo/acceso.php");

            $mi_servidor=new nusoap_server();
            $mi_servidor->register(
                'producto',                  
                array('valor'=>'xsd:string'), 
                                              
                array('return'=>'xsd:string') 
                                              
            );
            
            // Aquí se arranca el servicio
            $post=file_get_contents('php://input');
            $mi_servidor->service($post);
            
             function producto ($nombre){
               $producto = sacarProductoPorNombre($nombre);
               
               if($producto == null) return "El producto indicado no existe en la tienda";
               else                  return "El producto cuesta {$producto["precio"]} euros y actualmente nos quedan {$producto["stock"]} unidades.";
               
            }
?>

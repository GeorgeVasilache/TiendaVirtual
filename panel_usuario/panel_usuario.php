<?php

    //primero comprobamos que haya una sesión abierta mediante la cookie
    if(isset($_COOKIE["id"])){
      //acceso a la base de datos
      require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
      
      //módulo de inicio de sesión
      require_once("/home/ubuntu/workspace/TiendaVirtual/inicio_sesion.php");
      
      //El admin tiene la id 16 en la base de datos
      if($_COOKIE["id"] == "16"){
        $titulo = "Panel del administrador";
        
        //Si se acaba de añadir un producto nuevo, saldrá un mensaje
        if (isset($_GET["nuevo"])){
          if($_GET["nuevo"] == 1) $msj_producto_nuevo = "<span class='text-success ml-2'>Producto añadido con éxito</span>";
          else $msj_producto_nuevo = "<span class='text-danger ml-2'>Error al añadir producto</span>";
        }
        
        //funcion para mostrar todos los productos de la base de datos
        
        function mostrarProductos (){
          $productos = listarProductos();
          
          echo "<table class='table table-striped'><tr><th> Producto </th><th> Nombre </th><th>Descripción</th><th>Categoría</th><th>Precio</th><th>Stock</th>";
          foreach($productos as $producto){
              
              echo "<tr><td><img src='{$producto["img"]}' class='icono'/></td>";
              echo "<td>{$producto["nombre"]}</td>";
              echo "<td>{$producto["descripcion"]}</td>";
              echo "<td>%{$producto["categoria"]}%</td>";
              echo "<td>{$producto["precio"]}€</td>";
              echo "<td>{$producto["stock"]}</td>";
              echo "<td><a href='eliminar_producto.php?eliminar={$producto["id"]}' class='btn btn-danger' role='button'><i class='material-icons'>delete_forever</i></a></td>";
          }
          echo "</table>";
          
        }
        
        function mostrarPedidos (){
          
          //Sacamos todos los pedidos
          $pedidos = listarPedidos();
          
          //Por cada pedido, sacamos el nombre del usuario y los datos de los productos del pedido
          foreach($pedidos as $pedido){
            $usuario = sacarUsuario($pedido["IDusuario"]);
            $productos_pedido = sacarProductosPedido($pedido["id"]);
            
            //Imprimimos los datos del pedido y el nombre del usuario
            echo "<ul class='list-group my-4'>
                    <li class='list-group-item'><span class='font-weight-bold'>Pedido Nº : </span>{$pedido["id"]}</li>
                    <li class='list-group-item'><span class='font-weight-bold'>Nombre : </span>{$usuario["nombre"]} {$usuario["apellidos"]}</li>
                    <li class='list-group-item'><span class='font-weight-bold'>Fecha : </span>{$pedido["fecha"]}</li>
                    <li class='list-group-item'><span class='font-weight-bold'>Estado : </span>{$pedido["estado"]}</li>";
                    
                    
            echo    "<li class='list-group-item'>
                      <ul class='list-group'>";
                      //En la última línea de la lista se imprime otra lista con los datos de todos los productos del pedido
                      foreach ($productos_pedido as $producto_pedido) {
                        $producto = sacarProducto($producto_pedido["IDproducto"]);
                        
                        echo "<li class='list-group-item'>
                                <img class='icono' src='{$producto["img"]}'/> {$producto["nombre"]} x{$producto_pedido["cantidad"]}
                              </li>";
                      }
                      
            echo    " </ul>
                    </li>
                  </ul>";
            
          }
        }
        
        //vista del panel del administrador
        require_once("/home/ubuntu/workspace/TiendaVirtual/panel_usuario/vista/vista_panel_admin.php");
      } 
      else{
        $titulo = "Panel de usuario";
        $usuario = sacarUsuario($_COOKIE["id"]);
        
        //vista del panel de usuario
        require_once("/home/ubuntu/workspace/TiendaVirtual/panel_usuario/vista/vista_panel_usuario.php");
      }
    }
    //si no hya una sesión abierta, redirigimos a la página principal de la tienda
    else{
      header("Location: /TiendaVirtual/index.php");
      exit();
    }
?>
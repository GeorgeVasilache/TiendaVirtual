<?php
          require_once("/home/ubuntu/workspace/TiendaVirtual/modelo/acceso.php");
          
          //Creamos un objeto de la clas SplFileInfo para obtener la extensión del archivo subido
          $info = new SplFileInfo($_FILES["img"]["name"]);
            
          $nombre = $_POST["nombre"];
          $desc = $_POST["descripcion"];
          $cat = $_POST["categoria"];
          $precio = $_POST["precio"];
          $stock = $_POST["stock"];
          
          //Esta variable es la url donde se guardara la imagen del producto
          $dir_subida = '/home/ubuntu/workspace/TiendaVirtual/img/';
          $url = $dir_subida . $_POST['nombre'].".".$info->getExtension();
          
          //Si la subida del archivo se realiza con éxito, se introducen los datos en la base de datos, y se redirige al panel del admin otra vez
          if (move_uploaded_file($_FILES['img']['tmp_name'], $url)) {
                    
                    //cambiamos la url para que cargue la imagen correctamente cuando se tenga que mostrar
                    $url = "/TiendaVirtual/img/". $_POST['nombre'].".".$info->getExtension();
                    
                    anyadirProducto($nombre, $desc, $cat, $precio, $stock, $url);
                    header("Location: /TiendaVirtual/panel_usuario/panel_usuario.php?nuevo=1");
          } else {
              header("Location: /TiendaVirtual/panel_usuario/panel_usuario.php?nuevo=0");
          }


?>
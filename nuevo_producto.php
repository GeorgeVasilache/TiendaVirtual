<?php
          require_once("modelo/acceso.php");
          
          //creamos un objeto de la clas SplFileInfo para obtener la extensión del archivo subido
          $info = new SplFileInfo($_FILES["img"]["name"]);
            
          $nombre = $_POST["nombre"];
          $desc = $_POST["descripcion"];
          $cat = $_POST["categoria"];
          $precio = $_POST["precio"];
          $stock = $_POST["stock"];
          
          //esta variable es la url donde se guardara la imagen del producto
          $dir_subida = '/home/ubuntu/workspace/TiendaVirtual/img/';
          $url = $dir_subida . $_POST['nombre'].".".$info->getExtension();
          
          //Si la subida del archivo se realiza con éxito, se introducen los datos en la base de datos, y se redirige al panel del admin otra vez
          if (move_uploaded_file($_FILES['img']['tmp_name'], $url)) {
              anyadirProducto($nombre, $desc, $cat, $precio, $stock, $url);
              header("Location: panel_usuario.php?nuevo=1");
          } else {
              header("Location: panel_usuario.php?nuevo=0");
          }


?>
<?php
 require_once ('abstraccion.php');

 //Devuelve un array con todos los productos existentes en la base de datos
 function listarProductos (){
      // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM productos", $link);

      // Rellenar el array
      $productos = array();
      while ($fila = extraer_resultados($result))
      {
      $productos[] = $fila;
      }

      // Cierre de conexión
      cerrar_conexion($link);
      return $productos;
 }
 
 //Función que extrae los productos de la categoría indicada
 function listarProductosPorCategoria ($cat){
      // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM productos where categoria='{$cat}'", $link);

      // Rellenar el array
      $productos = array();
      while ($fila = extraer_resultados($result))
      {
      $productos[] = $fila;
      }

      // Cierre de conexión
      cerrar_conexion($link);
      return $productos;
 }

 //Devuelve un producto a partir de su id
 function sacarProducto ($id){
     // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM productos where id= '".$id."'", $link);

      // Rellenar el array
      $producto = extraer_resultados($result);

      // Cierre de conexión
      cerrar_conexion($link);
      return $producto;
 }

 //Inserta todos los datos de un usuario nuevo en la base de datos
 function registrarUsuario ($email, $nick, $pass, $nombre, $apellidos, $dir, $tlf){
      // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("INSERT INTO  usuarios VALUES(default,'{$email}','{$nick}', '{$pass}','{$nombre}','{$apellidos}','{$dir}','{$tlf}')", $link);
      cerrar_conexion($link);
 }

 //Comprueba si el nick proporcionado ya está en la base de datos
 function comprobarDisponibilidad ($nick){
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM usuarios where nick='{$nick}'", $link);

      //si devuelve alguna fila, significa que ya hay algun usuario con el mismo nick, así que no está disponible para un nuevo registro

      if(mysql_fetch_array($result) === false) $disponible = true;
      else                                     $disponible = false;

      // Cierre de conexión
      cerrar_conexion($link);
      return $disponible;
 }

 //Comprueba que el nick y la contraseña proporcionados coincidan
 function comprobarUsuario ($nick, $pass){
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM usuarios where nick='{$nick}' and pass='{$pass}'", $link);

      //si devuelve alguna fila, significa que se ha introducido un nick y una contraseña correctos, por lo tanto se puede iniciar sesión con dicho usuario
      
      if(mysql_fetch_array($result) == false) return false;
      else                                     return true;
 }

 //A partir de un nick, devuelve su id asociado
 function sacarId ($nick){
     $link = abrir_conexion();

     // Consulta
     $result = consultar_base_de_datos("SELECT id FROM usuarios where nick='{$nick}'", $link);

     return mysql_fetch_array($result)["id"];
 }

 // A partir de una id proporcionada, devuelve los datos que coincidan con el mismo
 function sacarUsuario ($id){
    $link = abrir_conexion();
    
    $result = consultar_base_de_datos("SELECT * FROM usuarios where id='{$id}'", $link);
    
    return mysql_fetch_array($result);
 }
 
 //Funcion que inserta un nuevo producto en la base de datos 
 function anyadirProducto ($nombre, $desc, $categoria, $precio, $stock , $img){
    $link = abrir_conexion();

    $result = consultar_base_de_datos("INSERT INTO productos VALUES(default, '{$nombre}', '{$desc}', '{$precio}', '{$stock}', '{$categoria}','{$img}');", $link);
    
 }
 
 //Funcion que elimina el producto con la id indicada
 function eliminarProducto ($id){
  
   $link = abrir_conexion();

   $result = consultar_base_de_datos("delete from productos where id='$id';", $link);
 }
 
 //Función que elimina el usuario con la id indicada
 function eliminarUsuario ($id){
  
   $link = abrir_conexion();

   $result = consultar_base_de_datos("delete from usuarios where id='$id';", $link);
 }
 
 //Functión que registra un pedido en la bse de datos a partir del carrito y el id del usuario
 function confirmarCompra ($carrito, $id_usuario){
   
  
   
   //Obtenemos la fecha en la que se realiza el pedido
   $date = getdate();
   
   //Extraemos solamente día, mes y año
   $fecha = $date["mday"]."/".$date["mon"]."/".$date["year"];
   
   //Insertamos los datos del pedido en la tambla pedido
   $result = consultar_base_de_datos("INSERT INTO pedidos VALUES ('DEFAULT', '{$id_usuario}', STR_TO_DATE('$fecha', '%d/%m/%Y'), 'pendiente');", $link);
   $id_pedido = mysql_insert_id();
   
   //Insertamos por cada producto del pedido, una línea en la tabla compuesto
   
   $productos = $carrito->getProductos();

   //Si todo ha ido bien, se devolverá un true, sino se devolverá false
   foreach($productos as $producto){
    if(!consultar_base_de_datos("INSERT INTO compuesto VALUES('{$id_pedido}', '{$producto->getID()}', {$producto->getCantidad()});", $link))
      return false;
    else
      consultar_base_de_datos("UPDATE productos SET stock= stock-{$producto->getCantidad()} WHERE id = {$producto->getID()};", $link); //Se resta el stock
   }
   
   return true;
   
 }
 
 //Función que devuelve todos los pedidos de la base de datos
 function listarPedidos(){
    // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM pedidos", $link);

      // Rellenar el array
      $pedidos = array();
      while ($fila = extraer_resultados($result))
      {
      $pedidos[] = $fila;
      }

      // Cierre de conexión
      cerrar_conexion($link);
      return $pedidos;
 }
 
 //Función que devuelve todos los id de los productos junto con su cantidad en un pedido en concreto
 function sacarProductosPedido($id){
  
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM compuesto where IDpedido = {$id}", $link);
      
      // Rellenar el array
      $productos = array();
      while ($fila = extraer_resultados($result))
      {
      $productos[] = $fila;
      }

      // Cierre de conexión
      cerrar_conexion($link);
      return $productos;
 }
 
 
?>

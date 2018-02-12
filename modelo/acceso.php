<?php
 require_once ('abstraccion.php');

 //Devuelve un array con todos los productos existentes en la base de datos
 function listarProductos(){
      // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos('SELECT * FROM productos', $link);

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
 function sacarProducto($id){
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
 function registrarUsuario($email, $nick, $pass, $nombre, $apellidos, $dir, $tlf){
      // Conexión a la base de datos
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("INSERT INTO  usuarios VALUES(default,'{$email}','{$nick}', '{$pass}','{$nombre}','{$apellidos}','{$dir}','{$tlf}')", $link);
      cerrar_conexion($link);
 }

 //Comprueba si el nick proporcionado ya está en la base de datos
 function comprobarDisponibilidad($nick){
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
 function comprobarUsuario($nick, $pass){
      $link = abrir_conexion();

      // Consulta
      $result = consultar_base_de_datos("SELECT * FROM usuarios where nick='{$nick}' and pass='{$pass}'", $link);

      //si devuelve alguna fila, significa que se ha introducido un nick y una contraseña correctos, por lo tanto se puede iniciar sesión con dicho usuario
      
      if(mysql_fetch_array($result) == false) return false;
      else                                     return true;
 }

 //A partir de un nick, devuelve su id asociado
 function sacarId($nick){
     $link = abrir_conexion();

     // Consulta
     $result = consultar_base_de_datos("SELECT id FROM usuarios where nick='{$nick}'", $link);

     return mysql_fetch_array($result)["id"];
 }

 // A partir de una id proporcionada, devuelve los datos que coincidan con el mismo
 function sacarUsuario($id){
    $link = abrir_conexion();
    
    $result = consultar_base_de_datos("SELECT * FROM usuarios where id='{$id}'", $link);
    
    return mysql_fetch_array($result);
 }
 
 //Funcion que inserta un nuevo producto en la base de datos 
 function anyadirProducto($nombre, $desc, $categoria, $precio, $stock , $img){
    $link = abrir_conexion();

    $result = consultar_base_de_datos("INSERT INTO productos VALUES(default, '{$nombre}', '{$desc}', '{$precio}', '{$stock}', '{$categoria}','{$img}');", $link);
    
 }
 
 //Funcion que elimina el producto con la id indicada
 function eliminarProducto($id){
  
   $link = abrir_conexion();

   $result = consultar_base_de_datos("delete from productos where id='$id';", $link);
 }
 
 //Función que elimina el usuario con la id indicada
 function eliminarUsuario($id){
  
   $link = abrir_conexion();

   $result = consultar_base_de_datos("delete from usuarios where id='$id';", $link);
 }
 
 
?>

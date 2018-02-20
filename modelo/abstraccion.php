<?php
//Métodos que interactúan directamente con la bse de datos
 function abrir_conexion(){
  return mysql_connect("localhost", "root", "root");
 }
 function cerrar_conexion($link)
 {
  mysql_close($link);
 }
 function consultar_base_de_datos($consulta, $link)
 {
  //Se selecciona la base de datos "tienda"
  mysql_select_db("tienda", $link);
  
  //Se selecciona el conjunto de caracteres UTF-8 para que no haya problemas a la hora de recoger los datos con carácteres como las tildes
  mysql_set_charset("utf8");
  
  //Se realiza la consulta indicada
  return mysql_query($consulta, $link);
 }
 function extraer_resultados($result)
 {
  return mysql_fetch_array($result, MYSQL_ASSOC);
 }
?>
<?php
 function abrir_conexion(){
  return mysql_connect("localhost", "root", "root");
 }
 function cerrar_conexion($link)
 {
  mysql_close($link);
 }
 function consultar_base_de_datos($consulta, $link)
 {
  mysql_select_db("tienda", $link);
  mysql_set_charset("utf8");
  return mysql_query($consulta, $link);
 }
 function extraer_resultados($result)
 {
  return mysql_fetch_array($result, MYSQL_ASSOC);
 }
?>
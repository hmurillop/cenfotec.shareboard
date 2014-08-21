<?php
  $conexion = mysql_connect('127.0.0.1','root','')
  or die('no se puede seleccionar la base de datos');

  mysql_select_db("bdshareboard")
  or die ("No conecto esa base de datos");

  $data = file_get_contents("php://input");

  $objData = json_decode($data);


  $consulta = mysql_query('SELECT * FROM tbusuario WHERE email ="' . $objData->datos .'";', $conexion);
  $recuperacion = mysql_num_rows($consulta) === 1;
  var_dump($data);
  var_dump($recuperacion);
?>
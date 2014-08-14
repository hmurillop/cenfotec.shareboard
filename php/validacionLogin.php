<?php
    $conexion = mysql_connect('127.0.0.1','root','')
     or die("no se puede seleccionar la base de datos");

    mysql_select_db("bdshareboard")
	or die("No conecto esa base de datos");
	
	$consulta = mysql_query("SELECT * FROM tbusuario", $conexion);
	$nfilas = mysql_num_rows($consulta);
	
	if($nfilas>0){
      for($i=0; $i<$nfilas ; $i++){
	    $fila = mysql_fetch_array($consulta);
	    $datos=$fila['email'];
		echo json_encode($datos);
	  }	
	}
  	
?>

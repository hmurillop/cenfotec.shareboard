<?php
	$conexion = mysql_connect('127.0.0.1','root','')
	 or die("no se puede seleccionar la base de datos");

	mysql_select_db("bdshareboard")
	or die("No conecto esa base de datos");

	$data = file_get_contents("php://input");
    
	$objData = json_decode($data);
	$objData = $objData->data;

	$consulta  = mysql_query('SELECT * FROM  tbusuario WHERE email ="'. $objData->email .'" && contrasenna = "'.$objData->contrasenna.'";', $conexion);
    $validacion =is_resource($consulta);

    var_dump($validacion);

    // if($validacion === true){
    //    header ("Location: ../blog_1.html");
    // }
    // else{
    //  	print 'Error';
    //  }
	
?>

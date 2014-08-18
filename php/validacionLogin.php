<?php
	$conexion = mysql_connect('127.0.0.1','root','')
	 or die("no se puede seleccionar la base de datos");

	mysql_select_db("bdshareboard")
	or die("No conecto esa base de datos");

	$data = file_get_contents("php://input");
    
	$objData = json_encode($data);
	

	$consulta  = mysql_query('SELECT * FROM  tbusuario WHERE email ="'. $objData->email .'" && contrasenna = "'.$objData->contrasenna.'";', $conexion);
    $validacion = is_string($consulta);
    print $validacion;

    if($validacion === true){
    echo header ("Location: ../blog_1.html");
    }
    else{
     	print 'Error';
     }
	
?>

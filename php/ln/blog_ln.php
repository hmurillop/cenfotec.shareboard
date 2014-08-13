
<?php
// define variables and set to empty values



function ObtenerEntradaPorId(){

include('blog_ad.php');//Incluye el archivo de conexion a base de datos
$blog = new blog_ad();			
$Obj_respuesta=$blog->ObtenerEntradaBlogPorId(1);

}

function test(){
$conexion = mysql_connect('27.0.0.1','root','root')
	or die("no se puede seleccionar la base de datos");
	
	
    mysql_select_db("bdshareboard")
	or die ("No conecto esa base de datos");
	
	$consulta =mysql_query("SELECT * FROM tbpublicaionesblog ", $conexion);
	$nfilas = mysql_num_rows ($consulta);
	
	if($nfilas>0){
	  for($i=0; $i < $nfilas; $i++){
        $fila = mysql_fetch_array($consulta);
        print "Entrada :".$fila["entrada"]."<br/>";		
	  }
	}
}

test();
?>



<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);	
// define variables and set to empty values


/*
function ObtenerPublicacionBlogPorId($idBlog){
	include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new blog_ad();			
	$datosPublicacion=$blog->ObtenerPublicacionBlogPorId($idBlog);
	$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	$datosPublicacion['comentarios']= $comentariosPublicacion	;
	return json_encode($datosPublicacion);
}
*/
function ObtenerPublicacionBlogPorIdUsuario($idBlog){
	include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new blog_ad();			
	$datosPublicacion=$blog->ObtenerPublicacionBlogPorIdUsuario($idBlog);
	//$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion['comentarios']= $comentariosPublicacion	;
	//return json_encode($datosPublicacion);
	echo json_encode($datosPublicacion);
}

$accion = $_REQUEST['accion'];

switch ($accion ) {
    case "obtenerPublicacion":
        //ObtenerPublicacionBlogPorId(1);
		ObtenerPublicacionBlogPorIdUsuario(1);
        break;  
	 case "obtenerPublicacionPorUsuario":
        ObtenerPublicacionBlogPorIdUsuario(1);
        break;  		
    default:
        echo "Opcion invalida";
        break;
}

?>


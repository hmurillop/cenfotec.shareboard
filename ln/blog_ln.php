
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
function ObtenerPublicacionBlogPorIdUsuario($idUsuario){
	include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new blog_ad();			
	$datosPublicacion=$blog->ObtenerPublicacionBlogPorIdUsuario($idUsuario);

		foreach ($datosPublicacion as &$publicacion) {
			//echo $publicacion["IdPublicacionesBlog"];
			$publicacion["comentario"]=$blog->ObtenerComentariosPublicacionBlog($publicacion["IdPublicacionesBlog"]);	
		}

	
	//$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion['comentarios']= $comentariosPublicacion	;
	//return json_encode($datosPublicacion);
	echo json_encode($datosPublicacion);
}


function InsertarPublicacionBlog($idBlog,$titulo,$entrada){
	include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new blog_ad();			
	$datosPublicacion=$blog->InsertarPublicacionBlog($idBlog,$titulo,$entrada);

	echo json_encode($datosPublicacion);
}



$xxx = $_REQUEST['accion'];
//$request_body = file_get_contents('php://input');
//$data = json_decode($request_body);

//$titulo=accion.titulo;

switch ($xxx ) {
    case "obtenerPublicacion":
        //ObtenerPublicacionBlogPorId(1);
		ObtenerPublicacionBlogPorIdUsuario(1);
        break;  
	 case "obtenerPublicacionPorUsuario":
        ObtenerPublicacionBlogPorIdUsuario(1);
        break; 
	case "InsertarPublicacionBlog":
        InsertarPublicacionBlog(1,$data['titulo'],$data['entrada']);		
        break;  		
    default:
        echo "Opcion invalida";
        break;
}

?>


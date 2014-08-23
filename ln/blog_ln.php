
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);	
// define variables and set to empty values
include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
 
function ObtenerPublicacionBlogPorIdUsuario($idUsuario){
	
	$blog = new blog_ad();			
	$datosPublicacion=$blog->ObtenerPublicacionBlogPorIdUsuario($idUsuario);

		foreach ($datosPublicacion as &$publicacion) {			
			$publicacion["comentario"]=$blog->ObtenerComentariosPublicacionBlog($publicacion["IdPublicacionesBlog"]);	
		}
		//Devolvemos todas las publica con los datos y sus comentarios
	echo json_encode($datosPublicacion );
}


function InsertarPublicacionBlog($idBlog,$titulo,$entrada){
	//include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new blog_ad();			
	$blog->InsertarPublicacionBlog($idBlog,$titulo,$entrada);
	//traemos todas las publicaciones ahora ya con la que acabamos de ingresar
	$datosPublicacion=$blog->ObtenerPublicacionBlogPorIdUsuario(1);

		foreach ($datosPublicacion as &$publicacion) {			
			$publicacion["comentario"]=$blog->ObtenerComentariosPublicacionBlog($publicacion["IdPublicacionesBlog"]);	
		}
		//Devolvemos todas las publica con los datos y sus comentarios
	echo json_encode($datosPublicacion);
}



$accion = $_REQUEST['accion'];
$parametros = json_decode(file_get_contents("php://input"));
 
switch ($accion ) {    
	 case "obtenerPublicacionPorUsuario":
        ObtenerPublicacionBlogPorIdUsuario(1);
        break; 
	case "InsertarPublicacionBlog":
        InsertarPublicacionBlog(1,$parametros->data->titulo,$parametros->data->entrada);		
        break;  		
    default:
        echo "Opcion invalida";
        break;
}

?>


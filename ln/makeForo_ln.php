
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
function obtenerListaCarrera($idBlog){
	include('../cad/foro_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new foro_ad();			
	$datosPublicacion=$blog->obtenerListaCarrera($idBlog);
	//$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion['comentarios']= $comentariosPublicacion	;
	//return json_encode($datosPublicacion);
	echo json_encode($datosPublicacion);
};

function obtenerListaCursos($idBlog){
	include('../cad/foro_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new foro_ad();			
	$datosPublicacion=$blog->obtenerListaCursos($idBlog);
	//$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion['comentarios']= $comentariosPublicacion	;
	//return json_encode($datosPublicacion);
	echo json_encode($datosPublicacion);
};

function obtenerListaProfesores($idBlog){
	include('../cad/foro_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new foro_ad();			
	$datosPublicacion=$blog->obtenerListaProfesores($idBlog);
	//$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion['comentarios']= $comentariosPublicacion	;
	//return json_encode($datosPublicacion);
	echo json_encode($datosPublicacion);
};

function obtenerListaUsuarios($idBlog){
	include('../cad/foro_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new foro_ad();			
	$datosPublicacion=$blog->obtenerListaUsuarios($idBlog);
	//$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion['comentarios']= $comentariosPublicacion	;
	//return json_encode($datosPublicacion);
	echo json_encode($datosPublicacion);
};


$accion = $_REQUEST['accion'];

switch ($accion ) {
    case "obtenerListaCarrera":
		obtenerListaCarrera(1);
        break;
    case "obtenerListaCursos":
		obtenerListaCursos(1);
        break;
    case "obtenerListaProfesores":
		obtenerListaProfesores(1);
        break;
    case "obtenerListaUsuarios":
		obtenerListaUsuarios(1);
        break;  		
    default:
        echo "Opcion invalida";
        break;
}

?>



<?php
// define variables and set to empty values



function ObtenerEntradaPorId($idBlog){

	include('../cad/blog_ad.php');//Incluye el archivo de conexion a base de datos
	$blog = new blog_ad();			
	$datosPublicacion=$blog->ObtenerPublicacionBlogPorId($idBlog);
	$comentariosPublicacion=$blog->ObtenerComentariosPublicacionBlog($idBlog);
	//$datosPublicacion[count($datosPublicacion)]={"comentarios"=$comentariosPublicacion	};
	$datosPublicacion['comentarios']= $comentariosPublicacion	;
	echo json_encode($datosPublicacion);
}

ObtenerEntradaPorId(1);
?>


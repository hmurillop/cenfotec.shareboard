<?php
/**
 *Clase utilizada para realizar los diferentes procesos y consultas a la base de datos SIMOTRAV
 * @author Ing.Dagoberto Gomez Jimenez
 */

class blog_ad{	
	/**
	*Objeto de conexion a la base de datos
	*/
	private $Obj_BD;	
	
	/**
	*Constructor de la clase
	*/	
	public function blog_ad(){}		
		
	public function ObtenerPublicacionBlogPorId($id){		
		try{			
				//if(!Obj_BD){				
					include('BaseDatos_AD.php');//Incluye el archivo de conexion a base de datos			
					$this->Obj_BD = new BaseDatos_AD();						
				//}
			
			$Str_Query = 'select * from tbpublicaionesblog where idBlog=1;';		
			$conexion = $this->Obj_BD->Conectar();		
			$Obj_resultado = $this->Obj_BD->SQLQuery($conexion,$Str_Query);				
			if(!$Obj_resultado){				
			$Obj_respuesta = '<b>ERROR:</b> No se logro realizar la transaccion.<br><b>Detalle: </b>'.mysql_error();			
			}else{									
					$Int_Contador = 0;					
					while($Obj_fila = mysql_fetch_assoc($Obj_resultado)){					
						$Obj_respuesta[$Int_Contador] = $Obj_fila;					
						$Int_Contador++;				
					}
			}			
			$this->Obj_BD->FreeMem($Obj_resultado);			
			$this->Obj_BD->Cerrar($conexion);						
			return $Obj_respuesta;
			
		}catch (Exception $ERROR){			
			throw $ERROR;		
		}	
	}
	
	public function ObtenerComentariosPublicacionBlog($id){		
		try{			
				if(!Obj_BD){				
					include('BaseDatos_AD.php');//Incluye el archivo de conexion a base de datos			
					$this->Obj_BD = new BaseDatos_AD();						
				}
				$Str_Query = 'select * from tbcomentariosblog where IdPublicacionesBlog=1;';		
				$conexion = $this->Obj_BD->Conectar();		
				$resultado = $this->Obj_BD->SQLQuery($conexion,$Str_Query);				
				if(!$resultado){				
				$Obj_respuesta = '<b>ERROR:</b> No se logro realizar la transaccion.<br><b>Detalle: </b>'.mysql_error();			
				}else{									
						$Int_Contador = 0;					
						while($Obj_fila = mysql_fetch_assoc($resultado)){					
							$Obj_respuesta[$Int_Contador] = $Obj_fila;					
							$Int_Contador++;				
						}
				}			
				$this->Obj_BD->FreeMem($resultado);			
				$this->Obj_BD->Cerrar($conexion);						
			return $Obj_respuesta;
			
		}catch (Exception $ERROR){			
			throw $ERROR;		
		}	
	}
}
?>
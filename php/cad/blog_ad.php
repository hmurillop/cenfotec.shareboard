<?php

class blog_ad{	
	/**
	*Objeto de conexion a la base de datos
	*/
	private $Obj_BD;	
	
	/**
	*Constructor de la clase
	*/	
	public function blog_ad(){}		
	
	public function ObtenerEntradaBlogPorId($id){		
		try{			
				include('BaseDatos_AD.php');//Incluye el archivo de conexion a base de datos
			
			$this->Obj_BD = new BaseDatos_AD();			
			$Str_Query = 'CALL '.$this->Obj_BD->BaseDatos().".tbpublicaionesblog('".$id."');";		
			$Obj_Conexion = $this->Obj_BD->Conectar();		
			$Obj_resultado = $this->Obj_BD->SQLQuery($Obj_Conexion,$Str_Query);				
			if(!$Obj_resultado){				
				$Obj_respuesta = '<b>ERROR:</b> No se logro realizar la transaccion.<br><b>Detalle: </b>'.mysqli_error();			
			}else{	
				$Int_Contador = 0;					
				while($Obj_fila = mysqli_fetch_assoc($Obj_resultado)){					
					$Obj_respuesta[$Int_Contador] = $Obj_fila;					
					$Int_Contador++;				
				}
			}			
			$this->Obj_BD->FreeMem($Obj_resultado);			
			$this->Obj_BD->Cerrar($Obj_Conexion);						
			return $Obj_respuesta;
			
		}catch (Exception $ERROR){			
			throw $ERROR;		
		}	
	}
}
?>
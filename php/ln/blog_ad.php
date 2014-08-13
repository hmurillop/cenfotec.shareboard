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
		
	public function ObtenerEntradaBlogPorId($id){		
		try{			
				include('BaseDatos_AD.php');//Incluye el archivo de conexion a base de datos
				
			$this->Obj_BD = new BaseDatos_AD();			
			//$Str_Query = 'CALL '.$this->Obj_BD->BaseDatos().".prCarreraObtenerPorId('".$id."');";		
			$Str_Query = 'CALL prObtenerPublicacionesBlogPorId(1);';		
			$Obj_Conexion = $this->Obj_BD->Conectar();		
			$Obj_resultado = $this->Obj_BD->SQLQuery($Obj_Conexion,$Str_Query);				
			if(!$Obj_resultado){				
			$Obj_respuesta = '<b>ERROR:</b> No se logro realizar la transaccion.<br><b>Detalle: </b>'.mysql_error();			
			}else{					
				$nfilas = mysql_num_rows ($Obj_resultado);
				if($nfilas>0){
					  for($i=0; $i < $nfilas; $i++){
						$fila = mysql_fetch_array($Obj_resultado);
						print "Entrada:".$fila["entrada"]."<br/>";		
					  }
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
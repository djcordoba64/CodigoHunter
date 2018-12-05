<?php
 /**
  * 
  */
 class Trazabilidad extends Controlador
 {
 	
 	function __construct()
 	{
 		$this->recepcionModelo = $this->modelo('Recepcion');
 		$this->modeloTrazabilidad = $this->modelo('Trazabilidad_torrefaccion');
 	}


	public function consultar_mostrarInicio($datos=[]){
		
			//me retorna a la vista.
			$this->vista('/Trazabilidad/mostrar_inicio', $datos);	
	}
 }
?>
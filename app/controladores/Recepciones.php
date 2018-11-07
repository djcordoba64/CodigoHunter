<?php

/**
* 
*/
	class Recepciones extends Controlador
	{
		
		function __construct()
		{
			$this->recepcionModelo = $this->modelo('Recepcion');
			$this->personaModelo = $this->modelo('Persona');
		}


		//CONSULTAR SI EL CLIENTE EXISTE CON EL NÚMERO DE DOCUMENTO
		public function consultar($documento){
		//consultamos el cliente si existe
		$cliente=$this->personaModelo->obtenerclienteDocumento($documento);
				
				$datos=[
					'idPersona'=> $cliente->idPersona,				
				];
			$this->vista('/Recepciones/consultar', $datos);
			
		}
	}


?>
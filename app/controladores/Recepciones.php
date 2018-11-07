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


		//muestra formulario vacio (GET - click en en link registrar recepcion)
		// solo campo identificacion y boton buscar
		public function registrar_nueva(){
		
			$this->vista('/Recepciones/registrar_nueva', $datos);
			
		}

		//busca el cliente con el numero de documento enviado (POST - submit boton consultar) 
		// si cliente existe muestra formulario  campos solo lectura del cliente y lista de fincas para que usuario seleccione finca, y muestra boton siguiente (seleccionar finca)
		public function registrar_consultar($documento){
		//consultamos el cliente si existe
		$cliente=$this->personaModelo->obtenerClienteDocumento($documento);
				
				$datos=[
					'idPersona'=> $cliente->idPersona,				
				];
			$this->vista('/Recepciones/registrar_seleccionar_finca', $datos);
			
		}

		//me llega el cliente y la finca seleccionada (campos hidden) (POST - submit boton "agregra cafe") 
		// si cliente existe muestra formulario  campos solo lectura del cliente y lista de fincas para que usuario seleccione finca, mostrar boton siguiente (agregar cafe)
		public function registrar_finca_seleccionada($documento){
		//consultamos el cliente si existe
		$cliente=$this->personaModelo->obtenerClienteDocumento($documento);
				
				$datos=[
					'idPersona'=> $cliente->idPersona,				
				];
			$this->vista('/Recepciones/registrar_agregar_cafes', $datos);
			
		}
	}


?>
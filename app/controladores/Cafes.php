<?php
/**
 * 
 */
 class Cafes extends Controlador
 {
 	
 	function __construct()
 	{
 		$this->cafeModelo = $this->modelo('Cafe');
 		$this->recepcionModelo = $this->modelo('Recepcion');
		$this->personaModelo = $this->modelo('Persona');
		$this->fincaModelo = $this->modelo('Finca');
 	}
 	//me muestra el formulario vacio del café y envio el idCliente y idFinca
 	public function agregar_finca_seleccionada($datos){
 		

 		$datos=[				
					
					'idCafe'	=>'',
					'codigoCafe'=>'',
					'peso'=>'',
					'especie'=>'',
					'variedad'=>'',
					'porcentajeHumedad'=>'',
					'factorRendimiento'=>'',
					'tipoTueste'=>'',
					'molidadMedilaLibra'=>'',
					'granoMediaLibra'=>'',
					'granoLibra'=>'',
					'estado'=>'',
					'foto'=>'',
					'cantidad'=>'',
					'valorUnitario'=>'',
					'idMateriPrima'=>'',
					'idTipoBeneficio'=>'',
				];
		
			$this->vista('/Cafes/agregar_finca_seleccionada', $datos);
			
		}
		public function registrar_agregar_cafes(){
			
		}


 } 

 ?>
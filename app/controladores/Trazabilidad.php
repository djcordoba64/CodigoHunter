<?php
 /**
  * 
  */
 class Trazabilidad extends Controlador
 {
 	
 	function __construct()
 	{
 		$this->recepcionModelo = $this->modelo('Recepcion');
 		$this->personaModelo = $this->modelo('Persona');
 		$this->cafeModelo = $this->modelo('Cafe');
 		$this->Trazabilidadmodelo = $this->modelo('Trazabilidad_torrefaccion');
 	}


	public function consultar_mostrarInicio($datos=[]){
		
			//me retorna a la vista.
			$this->vista('/Trazabilidad/mostrar_inicio', $datos);	
	}

	public function validar_numeroRecibo(){

		//guardo en una variable lo que vienen del post que es el numero del recibo.
		$numero=$_POST['numero'];
		//consultamos si el numero de recibo esta en la base de datos.

		if($this->Trazabilidadmodelo->reciboExiste($numero)){

			//obtengo los datos
			$resultado=$this->Trazabilidadmodelo->optenerDatos($numero);

			if ($resultado->Estado=='Activo') {

				$datos=[
					'idRecepcion'=>$resultado->numeroRecibo,												
					'fecha'=>$resultado->created_at,
					'correo'=>$resultado->correo,
					'primerNombre'	=>$resultado->primerNombre,
					'segundoNombre'=>$resultado->segundoNombre,
					'primerApellido'=>$resultado->primerApellido,
					'segundoApellido'=>$resultado->segundoApellido,	
					];	

						
				$cafes= $this ->cafeModelo->obtenerCafesRecepcion($datos['idRecepcion']);
				$cafes = json_encode($cafes);
				
				$datos["cafes"]=$cafes;
				
				$this->vista('/Trazabilidad/mostrar_opciones', $datos);
				
			}else{

				//el recibo esta anulado
				$datos=array('mensaje_error'=>'El recibo fue anulado');
				$this->vista('/Trazabilidad/mostrar_inicio', $datos);
			}	

		}else{

			//no exite
			$datos=array('mensaje_error'=>'No hay un recibo  registrado con el numero ingresado');
			$this->vista('/Trazabilidad/mostrar_inicio', $datos);
		}

	}


 }
?>
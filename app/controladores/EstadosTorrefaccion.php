<?php

/**
* 
*/
class EstadosTorrefaccion extends Controlador
{
	
	function __construct()
	{
		$this->recepcionModelo = $this->modelo('Recepcion');
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
	}

	public function index(){
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			
		}

	//Mustra el campo para ingresar el codigo del café.
	public function registrar_inicio($datos=[]){
			//validacion de rol
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);	
	}

	public function registrar_consultar_cafe(){
		//validacion de rol
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
			// agrego mensaje a arreglo de datos para ser mostrado 
			$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
			// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
			$this->vista('/paginas/index',$datos);
			return;
		}

		//valido si el café  esta registrado.
		if($this->cafesModelo->cafeExiste( $_POST['codigoCafe'] ) ){
			//si está registrado y estado es 'recibido' se sigue con el proceso.

				//obtengo los datos del café
				$datosCafe=$this->cafesModelo->optenerDatoscafe($_POST['codigoCafe']);
				$datos=[				
						
						'idcafe'=>$datosCafe->idcafe,
						'codigoCafe'=>$datosCafe->codigoCafe,			
					];

				if ($datosCafe->estado == 'recibido'){

				//se los mando al método validar_estados().
				$this->redirectToAction('EstadosTorrefaccion', "validar_estados", $datos);
			}else {
				//el suario no esta activo mostrar error
						$datos=array('mensaje_error'=>'El café esta registrado pero el estado es "Rechazado"');
						$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
			}

		}else
		{
			//Si no esta registrado muestra mensaje de adventencia.
			$datos=array('mensaje_error'=>'No hay un café registrado con el código ingresado');

			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
		}
	}

	public function validar_estados($datos){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			//valido si existe el café en la tabla estadosTorrefacción

			$existe=$this->TorrefaccionModelo->existeCafe_en_estados( $datos);

			if ($existe==1) // Tiene uno o varios estados
			{
				//consulto cual es el ultimo proceso
				$procesoActual=$this->TorrefaccionModelo->consultar_ultimo_proceso($datos);
		
				$datos=[
						'idestadosTorrefaccion'=>$procesoActual->idestadosTorrefaccion,
						'codigoEstado'=>$procesoActual->codigoEstado,
						'idcafe'=>$procesoActual->idcafe,
						'codigoCafe'=>$procesoActual->codigoCafe,

					];
				
			}

			if ($existe!=1) { //Es primera ver que se va ha registrar

				$this->redirectToAction('EstadosTorrefaccion', "iniciar_primer_proceso", $datos);
			}





			//verifico si tiene un estado el café
			$CantEstado=$this->TorrefaccionModelo->validar_ExisteEstado($datos);
			//var_dump($CantEstado);

			// si tine un estado consultao cual es el último estado actual.
			if($CantEstado==true)
				{
				
				$estadoActual=$this->TorrefaccionModelo->consultar_ultimo_estado($datos);
		
				$datos=[
						'codigoEstado'=>$estadoActual->codigoEstado,
						'idcafe'=>$estadoActual->idcafe,
						'codigoCafe'=>$estadoActual->codigoCafe,

					];

				//guardo en una variable el ultimo estado de un café.
				$letrasEstado=$datos['codigoEstado'];
				//echo $letrasEstado;

				//obtengo la ultima letra
				$ultimaletra=substr($letrasEstado, -1);

				//echo "$ultimaletra";
					
				$this->redirectToAction('EstadosTorrefaccion', "posibles_estados", $ultimaletra);

					
				
	}

	public function posibles_estados($datos){
		$P="P";
		$D="D";
		$F="F";
		//var_dump($datos);
		if ($datos==$P){
			echo "detener-finalizar-modificar";

		}
		if ($datos==$D) {
			echo "continuar-finalizar-modificar";
		}
		if ($datos==$F) {
			echo "proceso siguiente";
		}

	}


	

	
	

	
}


?>
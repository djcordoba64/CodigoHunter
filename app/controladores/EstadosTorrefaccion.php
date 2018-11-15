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
			if($_SESSION["rol"]!="coordinador")
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
		if($_SESSION["rol"]!="coordinador")
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
		if($_SESSION["rol"]!="coordinador")
		{
			// agrego mensaje a arreglo de datos para ser mostrado 
			$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
			// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
			$this->vista('/paginas/index',$datos);
			return;
		}

		//valido si el café esta registrado.
		if($this->cafesModelo->cafeExiste( $_POST['codigoCafe'] ) ){

			// guardo los datos
				$datos=[				
					'codigoCafe'=>trim($_POST['codigoCafe']),	
				];

			//var_dump($datos);

			$this->redirectToAction('EstadosTorrefaccion', "validar_estados", $datos);	
			
		}else
			{
					//Si no esta registrado muestra mensaje de error.
				$mensaje_error=array('mensaje_error'=>'No hay un café registrado con el código ingresado');
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $mensaje_error);
			}
	}

	public function validar_estados($datos){

		if($_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
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

					];

				//guardo en una variable el ultimo estado de un café.
				$letrasEstado=$datos['codigoEstado'];
				//echo $letrasEstado;

				//obtengo la ultima letra
				$ultimaletra=substr($letrasEstado, -1);

				//echo "$ultimaletra";
					
				$this->redirectToAction('EstadosTorrefaccion', "posibles_estados", $ultimaletra);

					
			}else {
				//no tiene estados entonces es primera vez.
				
				$this->redirectToAction('EstadosTorrefaccion', "iniciar_primer_proceso", $datos);
				
			}	
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


	public function iniciar_primer_proceso($datos){

		if($_SESSION["rol"]!="coordinador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

		$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);

	}

	public function	mostrar_formulario_trilla($datos){

		if($_SESSION["rol"]!="coordinador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
		var_dump($datos);

		$this->vista('/EstadosTorrefaccion/iniciar_trilla', $datos);

	}

	

	
}


?>
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

	//
	public function consultar_mostrarInicio($datos=[]){
			//validacion de rol
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
			//me retorna a la vista.
			$this->vista('/Trazabilidad/mostrar_inicio', $datos);	
	}
 }
?>
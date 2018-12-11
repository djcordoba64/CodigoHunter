<?php
/**
 * 
 */
class Entrega extends Controlador
{
	
	function __construct()
	{
		$this->recepcionModelo = $this->modelo('Recepcion');
		$this->EntregaCafeModelo=$this->modelo('EntregaCafe');
	}

	public function consultar_mostrarInicio($datos=[]){
			//validacion de rol
		if($_SESSION["rol"]!="administrador"	and $_SESSION["rol"]!="coordinador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
		
			//me retorna a la vista.
			$this->vista('/Entrega/mostrarInicio', $datos);	
	}
}
?>
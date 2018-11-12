<?php

/**
* 
*/
class Torrefaccion extends Controlador
{
	
	function __construct()
	{
		$this->recepcionModelo = $this->modelo('Recepcion');
		$this->cafesModelo = $this->modelo('Cafe');
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

			$this->vista('/Torrefaccion/registrar_inicio', $datos);	
	}

	public function registrar_consultar_cafe(){

		if($this->cafesModelo->cafeExiste( $_POST['codigoCafe'] ) ){

			$cafe= $this->cafesModelo->optenerId( $_POST['codigoCafe']);

				$datos=[
						'idcafe'=>$cafe->idcafe,		
						'codigoCafe'=>$cafe->codigoCafe,			

				];

				var_dump($datos);

				$datos["idCafe"]=$cafe;
		
		 	$this->vista('/Torrefaccion/registrar_consultar_cafe', $datos);
		}else
			{
				//NO se hizo submit al boton Consultar
				$mensaje_error=array('mensaje_error'=>'No hay un café registrado con el código');
				$this->vista('/Torrefaccion/registrar_inicio', $mensaje_error);
			}
	}
}


?>
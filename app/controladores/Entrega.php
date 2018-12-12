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
		$this->cafeModelo=$this->modelo('Cafe');
	}

	public function index($pagina=1,$mensaje='',$error=''){

			//validacion de rol
			if($_SESSION["rol"]!="administrador"	and $_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			 	
			if(!empty($error))
			{
				$datos['mensaje_error'] =$error;
			}

			if(!empty($mensaje))
			{
				$datos['mensaje_advertencia'] =$mensaje;
			}
			
			//echo $pagina;
			$recepciones_x_pagina=5;			
			
			//obtener los usuarios
			$iniciar=($pagina-1)*$recepciones_x_pagina ;
			

			$recepciones=$this->recepcionModelo->limit_recepciones($iniciar,$recepciones_x_pagina);

			$datos["recepciones"]=$recepciones;

			$total_recepciones_db=$this->recepcionModelo->contar_recepciones();
			
			//calculo es total de paginas
			$paginas=$total_recepciones_db->cuenta/$recepciones_x_pagina;
			$numeroPaginas= ceil($paginas);

			$datos['numeroPaginas']=$numeroPaginas;
			//echo $numeroPaginas;
			$datos["pagina"]=$pagina;

			$this->vista('/Entrega/mostrarInicio',$datos);
		}


	public function Mostrar_generarFactura($idRecepcion){
			//validacion de rol
		if($_SESSION["rol"]!="administrador"	and $_SESSION["rol"]!="coordinador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
		//consulatos los datos de la recepcion
			$datosRecepcion= $this->recepcionModelo->ConsultarDatos_x_id($idRecepcion);
				
					$datos=[
						//'codigoRecibo'	=> $datosRecepcion->codigorecibo,
						'fecha'	=> $datosRecepcion->created_at,	
						'primerNombre'	=> $datosRecepcion->primerNombre,
						'primerApellido'	=> $datosRecepcion->primerApellido,
						'documentoIdentidad'	=> $datosRecepcion->documentoIdentidad,
						'direccion'	=> $datosRecepcion->direccion,
						'numeroContacto'	=> $datosRecepcion->numeroContacto,
						'correo'	=> $datosRecepcion->correo,
						'nombreFinca'=>$datosRecepcion->nombreFinca,
						'municipio'=>$datosRecepcion->municipio,
						'Vereda'=>$datosRecepcion->vereda,
						'temperatura'	=> $datosRecepcion->temperatura,								

					];

			//consulto datos de los  cafés registrados  a esa recepción
			$datos["lotes"] = $this ->EntregaCafeModelo ->obtenerCafes_Facturainforme($idRecepcion);	

			//$datos['numeroRecibo']=$idRecepcion;

			//me retorna a la vista.
		$this->vista('/Entrega/generar_facturaInforme', $datos);	
	}
}
?>
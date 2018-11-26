<?php

/**
 * 
 */
class DatosTrilla extends Controlador
{
	
	function __construct()
	{
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
		$this->TrillaModelo=$this->modelo('Trilla');
	}

	//--------------REGISTRAR DATOS---------------------------------------
	public function mostrar_formulario_trilla($idcafe){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
	

		$datosCafe=$this->cafesModelo->consultar_x_idCafe($idcafe);

				$datos=[
						'idcafe'=>$datosCafe->idcafe,
						'codigoCafe'=>$datosCafe->codigoCafe,

				];

				//var_dump($datosCafe);

		$this->vista('/Trilla/agregar_datos', $datos);
	}

	public function registrar_datos($idcafe){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;

			}

			if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error'])){

				$datos=[
	
					'mermaTrilla'=>trim($_POST['mermaTrilla']),					
					'mallas'	=>trim($_POST['mallas']),	
					'observacion'=>trim($_POST['observacion']),
					'pesoCafeVerde'=>trim($_POST['pesoCafeVerde']),
									
				];


				$id = $this->TrillaModelo->crear($datos,$idcafe);

				if($id== -1){
					// no se ejecutó el insert
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/Trilla/agregar_datos', $datos);
					return;
				}
				else{
					
					// Si se realizo el insert
					$datos['mensaje_exito'] ='Exito al guardar los datos';
					$this->vista('EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					//redireccionar('/Cliente/editar');
				}

			}
			
	}


	//----------------------------------------------------------------

	//---------**EDITAR***----------------------------------------------------//

	public function editar_crgarDatos($idcafe){
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

		//consulatos los datos
		$datostrilla= $this->TrillaModelo->obtenerDatos_x_id($idcafe);

			$datos=[	
					'fechaHora'=>$datostrilla->fechaHora,
					'idcafe'=>$datostrilla->idcafe,
					'mermaTrilla'=>$datostrilla->mermaTrilla,
					'mallas'=>$datostrilla->mallas,
					'observacion'=>$datostrilla->observacion,
					'pesoCafeVerde'=>$datostrilla->pesoCafeVerde,
					'codigoCafe'=>$datostrilla->codigoCafe,
			];				

					$this->vista('/trilla/editar', $datos);

	}



	public function editar($idcafe){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error']))
		{
			$datos=[
					'idDatoTrilla'	=>$idDatoTrilla,
					'mermaTrilla'	=>trim($_POST['mermaTrilla']),					
					'mallas'	=>trim($_POST['mallas']),	
					'observacion'=>trim($_POST['observacion']),
					'pesoCafeverde'=>trim($_POST['pesoCafeverde']),
																									
			];

			$id = $this->TrillaModelo->actualizarDatos($datos);

			if($id==-1){
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					$this->vista('trilla/editar', $datos);
					return;
			}
			else{
					// exito
				$datos['mensaje_exito'] ='Exito al editar los datos';
				$this->vista('EstadosTorrefaccion/registrar_mostrar_estado', $datos);
				return;
			}

		}else
		{
			if(empty($datos)){
				
				//consulatos los datos
				$datostrilla= $this->TrillaModelo->obtenerDatos_x_id($idcafe);

				$datos=[

						'idDatoTrilla'=>$datostrilla->idDatoTrilla,	
						'fechaHora'=>$datostrilla->fechaHora,
						'idcafe'=>$datostrilla->idcafe,
						'mermaTrilla'=>$datostrilla->mermaTrilla,
						'mallas'=>$datostrilla->mallas,
						'observacion'=>$datostrilla->observacion,
						'pesoCafeVerde'=>$datostrilla->pesoCafeVerde,
						'codigoCafe'=>$datostrilla->codigoCafe,
					];

				

					$this->vista('/trilla/editar', $datos);
			}
		}
	}
	//-------------------------------------------------------------------//
}
?>
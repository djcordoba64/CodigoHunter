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
	public function mostrar_formulario_trilla($datos){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}


		$this->vista('/Trilla/agregar_datos', $datos);
	}

	public function registrar_datos(){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;

			}

		//recupero los datos del los input tipo hidden
		$codigoSiguiente=$_POST['codigoSiguiente'];
		$idcafe=$_POST['idcafe'];

				
		$id = $this->TorrefaccionModelo->insertarEstado($idcafe,$codigoSiguiente);

		if($id!==1){
			$datos['mensaje_exito']='NO se puede ejecutar el proceso';
			//$datos['mensaje_advertencia'] ='no se realizo el insert';
			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
			return;
		}
		else{
			//recupero los datos que vienes por POST
			$datos["mermaTrilla"]=$_POST['mermaTrilla'];
			$datos["mallas"]=$_POST['mallas'];
			$datos["observacion"]=$_POST['observacion'];
			$datos["pesoCafeVerde"]=$_POST['pesoCafeVerde'];

			//Y los guardo en la variable datos para hacer el Insert en la BD
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
					'idDatoTrilla'=>$datostrilla->idDatoTrilla,	
					'fechaHora'=>$datostrilla->fechaHora,
					'idcafe'=>$datostrilla->idcafe,
					'mermaTrilla'=>$datostrilla->mermaTrilla,
					'mallas'=>$datostrilla->mallas,
					'observacion'=>$datostrilla->observacion,
					'pesoCafeVerde'=>$datostrilla->pesoCafeVerde,
					'codigoCafe'=>$datostrilla->codigoCafe,
			];				
					//me redirecciona a la vista Editar, para cargar los datos en el formulario de edicion.
					$this->vista('/trilla/editar', $datos);

	}

	public function editar($idDatoTrilla){

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
					'idcafe'		=>trim($_POST['idcafe']),
					'mermaTrilla'	=>trim($_POST['mermaTrilla']),					
					'mallas'		=>trim($_POST['mallas']),
					'pesoCafeVerde'	=>trim($_POST['pesoCafeVerde']),	
					'observacion'	=>trim($_POST['observacion']),
					
				];

			var_dump($datos);

			$id = $this->TrillaModelo->actualizarDatos($datos);

			echo $id;
			if($id==0){

				$datos['mensaje_exito'] ='Exito al editar los datos';
				$this->vista('EstadosTorrefaccion/registrar_mostrar_estado', $datos);
				return;
					
			}
			else{
					
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					$this->vista('trilla/editar', $datos);
					return;
			}

		}
	}
	//-------------------------------------------------------------------//
}
?>
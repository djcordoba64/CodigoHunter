<?php
/**
 * 
 */
class DatosEstabilizacion extends Controlador
{
	
	function __construct()
	{
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
		$this->EstabilizacionModelo=$this->modelo('Estabilizacion');
	}

	//--------------REGISTRAR DATOS---------------------------------------
	public function mostrar_formulario($datos){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}


		$this->vista('/estabilizacion/agregar_datos', $datos);
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

				
		$id = $this->EstabilizacionModelo->insertarEstado($idcafe,$codigoSiguiente);

		if($id!==1){
			$datos['mensaje_exito']='NO se puede ejecutar el proceso';
			//$datos['mensaje_advertencia'] ='no se realizo el insert';
			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
			return;
		}
		else{
			//recupero los datos que vienes por POST
			$datos["estabilizacion"]=$_POST['estabilizacion'];
			$datos["observacion"]=$_POST['observacion'];

			//Y los guardo en la variable datos para hacer el Insert en la BD
			$datos=[
	
				'estabilizacion'=>trim($_POST['estabilizacion']),					
				'observacion'=>trim($_POST['observacion']),
			];

			
			$id = $this->EstabilizacionModelo->crear($datos,$idcafe);

			if($id== -1){
				// no se ejecutó el insert
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/estabilizacion/agregar_datos', $datos);
				return;
			}
			else{
					
				// Si se realizo el insert
				//$datos['mensaje_exito'] ='Exito al guardar los datos';
				//$this->vista('EstadosTorrefaccion/registrar_inicio', $datos);
				//return;
				redireccionar('/EstadosTorrefaccion/registrar_inicio');
			}
					
		}
	}


	//-----EDITAR-----------------------------------------------------------
	public function editar_cargarDatos($idcafe){
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

		//consulatos los datos
		$datosEstabilizacion= $this->EstabilizacionModelo->obtenerDatos_x_id($idcafe);

			$datos=[
					'codigoCafe'=>$datosEstabilizacion->codigoCafe,
					'iddatosEstabilizacion'=>$datosEstabilizacion->iddatosEstabilizacion,	
					'fechaHora'=>$datosEstabilizacion->fechaHora,
					'estabilizacion'=>$datosEstabilizacion->estabilizacion,
					'observacion'=>$datosEstabilizacion->observacion,
			];				
					//me redirecciona a la vista Editar, para cargar los datos en el formulario de edicion.
					$this->vista('/estabilizacion/editar', $datos);

	}

	public function editar($iddatosEstabilizacion){

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
					'iddatosEstabilizacion'	=>$iddatosEstabilizacion,
					'estabilizacion'	=>trim($_POST['estabilizacion']),					
					'observacion'	=>trim($_POST['observacion']),
					
				];

			$id = $this->EstabilizacionModelo->actualizarDatos($datos);
			if($id==0){

				$datos['mensaje_exito'] ='Exito al editar los datos';
				$this->vista('EstadosTorrefaccion/registrar_inicio', $datos);
				return;
					
			}
			else{
					
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					$this->vista('/pruebasLaboratorio/editar', $datos);
					return;
			}

		}
	}
}


?>
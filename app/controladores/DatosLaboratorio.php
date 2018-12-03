<?php
/**
 * 
 */
class DatosLaboratorio extends Controlador
{
	
	function __construct()
	{
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
		$this->LaboratorioModelo=$this->modelo('Laboratorio');
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


		$this->vista('/laboratorio/agregar_datos', $datos);
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
			$datos["perfilTaza2"]=$_POST['perfilTaza2'];
			$datos["observacion"]=$_POST['observacion'];

			//Y los guardo en la variable datos para hacer el Insert en la BD
			$datos=[
	
				'perfilTaza2'=>trim($_POST['perfilTaza2']),					
				'observacion'=>trim($_POST['observacion']),
			];

			$id = $this->LaboratorioModelo->crear($datos,$idcafe);

			if($id== -1){
				// no se ejecutó el insert
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/PruebasLaboratorio/agregar_datos', $datos);
				return;
			}
			else{
					
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
		$datosLaboratorio= $this->LaboratorioModelo->obtenerDatos_x_id($idcafe);

			$datos=[
					'codigoCafe'=>$datosLaboratorio->codigoCafe,
					'iddatosLaboratorio'=>$datosLaboratorio->iddatosLaboratorio,	
					'fechaHora'=>$datosLaboratorio->fechaHora,
					'perfilTaza2'=>$datosLaboratorio->perfilTaza2,
					'observacion'=>$datosLaboratorio->observacion,
			];				
					//me redirecciona a la vista Editar, para cargar los datos en el formulario de edicion.
					$this->vista('/laboratorio/editar', $datos);

	}

	public function editar($iddatosLaboratorio){

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
					'iddatosLaboratorio'	=>$iddatosLaboratorio,
					'perfilTaza2'	=>trim($_POST['perfilTaza2']),					
					'observacion'	=>trim($_POST['observacion']),
					
				];

			$id = $this->LaboratorioModelo->actualizarDatos($datos);
			if($id==0){

				$datos['mensaje_exito'] ='Exito al editar los datos';
				$this->vista('EstadosTorrefaccion/registrar_inicio', $datos);
				return;
					
			}
			else{
					
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					$this->vista('/laboratorio/editar', $datos);
					return;
			}

		}
	}


}


?>
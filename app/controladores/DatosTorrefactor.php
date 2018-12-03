<?php

/**
 * 
 */
class DatosTorrefactor extends Controlador
{
	
	function __construct()
	{
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
		$this->TorrefactorModelo=$this->modelo('Torrefactor');
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


		$this->vista('/torrefactor/agregar_datos', $datos);
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
			$datos["enfriar"]=$_POST['enfriar'];
			$datos["observacion"]=$_POST['observacion'];

			//Y los guardo en la variable datos para hacer el Insert en la BD
			$datos=[
	
				'enfriar'=>trim($_POST['enfriar']),
				'observacion'=>trim($_POST['observacion']),					
				
			];

			$id = $this->TorrefactorModelo->crear($datos,$idcafe);

			if($id== -1){
				// no se ejecutó el insert
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/Torrefaccion/agregar_datos', $datos);
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
		$datosTorrefactor= $this->TorrefactorModelo->obtenerDatos_x_id($idcafe);

			$datos=[
					'codigoCafe'=>$datosTorrefactor->codigoCafe,
					'iddatosTorrefactor'=>$datosTorrefactor->iddatosTorrefactor,	
					'fechaHora'=>$datosTorrefactor->fechaHora,
					'enfriar'=>$datosTorrefactor->enfriar,
					'observacion'=>$datosTorrefactor->observacion,
			];				
					//me redirecciona a la vista Editar, para cargar los datos en el formulario de edicion.
					$this->vista('/torrefactor/editar', $datos);

	}

	public function editar($iddatosTorrefactor){

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
					'iddatosTorrefactor'	=>$iddatosTorrefactor,
					'enfriar'	=>trim($_POST['enfriar']),					
					'observacion'	=>trim($_POST['observacion']),
					
				];

			$id = $this->TorrefactorModelo->actualizarDatos($datos);
			if($id==0){

				$datos['mensaje_exito'] ='Exito al editar los datos';
				$this->vista('EstadosTorrefaccion/registrar_inicio', $datos);
				return;
					
			}
			else{
					
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					$this->vista('/torrefactor/editar', $datos);
					return;
			}

		}
	}


}

?>
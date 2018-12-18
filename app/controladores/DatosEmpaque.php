<?php
/**
 * 
 */
class DatosEmpaque extends Controlador
{
	
	function __construct()
	{
		$this->cafeModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
		$this->EmpaqueModelo=$this->modelo('Empaque');
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

		$idcafe=$datos['idcafe'];

		$datosCafe= $this->cafeModelo ->consultar_x_idCafe($idcafe);
		$datos=[
					'idcafe'=>$datosCafe->idcafe,
					'codigoCafe'=>$datosCafe->codigoCafe,
					'codigoSiguiente'=>$datos['codigoSiguiente'],
					'molidaLibra'=>$datosCafe->molidaLibra,
					'molidaMediaLibra'=>$datosCafe->molidaMediaLibra,	
					'molidaCincoLibras'=>$datosCafe->molidaCincoLibras,
					'granoLibra'=>$datosCafe->granoLibra,
					'granoMediaLibra'=>$datosCafe->granoMediaLibra,	
					'granoCincoLibras'=>$datosCafe->granoCincoLibras,
					'agranel'=>$datosCafe->agranel,
					
		];	

					
		$this->vista('/empaque/agregar_datos', $datos);
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

		 //echo var_dump($id);
		if($id!==1){
			$datos['mensaje_exito']='NO se puede ejecutar el proceso';
			//$datos['mensaje_advertencia'] ='no se realizo el insert';
			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
			return;
		}
		else{
			//recupero los datos que vienes por POST
			$datos["empaque"]=$_POST['empaque'];
			$datos["observacion"]=$_POST['observacion'];

			//Y los guardo en la variable datos para hacer el Insert en la BD
			$datos=[
	
				'empaque'=>trim($_POST['empaque']),					
				'observacion'=>trim($_POST['observacion']),
			];

			
			$id = $this->EmpaqueModelo->crear($datos,$idcafe);

			if($id== -1){
				// no se ejecutó el insert
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/empaque/agregar_datos', $datos);
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
		$datosEmpaque=$this->EmpaqueModelo->obtenerDatos_x_id($idcafe);
		$datosCafe=$this->cafeModelo ->consultar_x_idCafe($idcafe);
			$datos=[

					'codigoCafe'=>$datosEmpaque->codigoCafe,
					'iddatosEmpaque'=>$datosEmpaque->iddatosEmpaque,	
					'fechaHora'=>$datosEmpaque->fechaHora,
					'empaque'=>$datosEmpaque->empaque,
					'observacion'=>$datosEmpaque->observacion,
					'idcafe'=>$datosCafe->idcafe,
					'molidaLibra'=>$datosCafe->molidaLibra,
					'molidaMediaLibra'=>$datosCafe->molidaMediaLibra,	
					'molidaCincoLibras'=>$datosCafe->molidaCincoLibras,
					'granoLibra'=>$datosCafe->granoLibra,
					'granoMediaLibra'=>$datosCafe->granoMediaLibra,	
					'granoCincoLibras'=>$datosCafe->granoCincoLibras,
					'agranel'=>$datosCafe->agranel,
			];				
					//me redirecciona a la vista Editar, para cargar los datos en el formulario de edicion.
		$this->vista('/empaque/editar', $datos);

	}

	public function editar($iddatosEmpaque){

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
					'iddatosEmpaque'	=>$iddatosEmpaque,
					'empaque'	=>trim($_POST['empaque']),					
					'observacion'	=>trim($_POST['observacion']),
					
				];

			$id = $this->EmpaqueModelo->actualizarDatos($datos);
			if($id==0){

				$datos['mensaje_exito'] ='Exito al editar los datos';
				$this->vista('EstadosTorrefaccion/registrar_inicio', $datos);
				return;
					
			}
			else{
					
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					$this->vista('/empaque/editar', $datos);
					return;
			}

		}
	}

}


?>
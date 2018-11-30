<?php

/**
 * 
 */
class DatosPruebasLaboratorio extends Controlador
{	
	function __construct()
	{
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
		$this->PruebasLaboratorioModelo=$this->modelo('PruebasLaboratorio');
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


		$this->vista('/pruebasLaboratorio/agregar_datos', $datos);
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
			$datos["humedad"]=$_POST['humedad'];
			$datos["densidad"]=$_POST['densidad'];
			$datos["actividadAcuosa"]=$_POST['actividadAcuosa'];
			$datos["disenoCurva"]=$_POST['disenoCurva'];
			$datos["observacion"]=$_POST['observacion'];

			//Y los guardo en la variable datos para hacer el Insert en la BD
			$datos=[
	
				'humedad'=>trim($_POST['humedad']),					
				'densidad'	=>trim($_POST['densidad']),	
				'actividadAcuosa'=>trim($_POST['actividadAcuosa']),
				'disenoCurva'=>trim($_POST['disenoCurva']),
				'observacion'=>trim($_POST['observacion']),
			];

			echo var_dump($datos);
			//echo $idcafe;
			$id = $this->PruebasLaboratorioModelo->crear($datos,$idcafe);

			if($id== -1){
				// no se ejecutó el insert
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/PruebasLaboratorio/agregar_datos', $datos);
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


	//----------------------------------------------------------------

	
}
?>
<?php

/**
* 
*/
class EstadosTorrefaccion extends Controlador
{
	
	function __construct()
	{
		$this->recepcionModelo = $this->modelo('Recepcion');
		$this->cafesModelo = $this->modelo('Cafe');
		$this->TorrefaccionModelo=$this->modelo('Torrefaccion');
	}

	public function index(){
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
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
			//validacion de rol
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);	
	}

	public function validar_cafeExiste(){
		//validacion de rol
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
			// agrego mensaje a arreglo de datos para ser mostrado 
			$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
			// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
			$this->vista('/paginas/index',$datos);
			return;
		}

		//valido si el café  esta registrado.
		if($this->cafesModelo->cafeExiste( $_POST['codigoCafe'] ) ){
			//si está registrado y estado es 'recibido' se sigue con el proceso.

				//obtengo los datos del café
			$datosCafe=$this->cafesModelo->optenerDatoscafe($_POST['codigoCafe']);
			$datos=[										
					'idcafe'=>$datosCafe->idcafe,
					'codigoCafe'=>$datosCafe->codigoCafe,			
					];


			if ($datosCafe->estado == 'recibido'){

				//se los mando al método validar_estados().
				$this->redirectToAction('EstadosTorrefaccion', "validar_estados", $datos);
			}else {
				//el suario no esta activo mostrar error
				$datos=array('mensaje_error'=>'El café esta registrado pero el estado es "Rechazado"');
				$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
			}

		}else
		{
			//Si no esta registrado muestra mensaje de adventencia.
			$datos=array('mensaje_error'=>'No hay un café registrado con el código ingresado');

			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
		}
	}

	public function validar_estados($datos){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

		//valido si existe el café en la tabla estadosTorrefacción

		$existe=$this->TorrefaccionModelo-> existeCafe_en_estados( $datos);

		if ($existe==1) // Tiene uno o varios estados
		{
				//consulto cual es el ultimo proceso
				$estados=$this->TorrefaccionModelo->consultar_idEstados($datos);

				//var_dump($IdEstadoUltimo);
				$datos=[
						'idestadosTorrefaccion'=>$estados->idestadosTorrefaccion,
						'idcafe'=>$estados->idcafe,
						'codigoEstado'=>$estados->codigoEstado,
						'codigoCafe'=>$estados->codigoCafe,

				];

				//var_dump($datos);
				//echo "tiene uno o varios estados";
				$this->redirectToAction('EstadosTorrefaccion', "consultar_proceso_sig", $datos);
		}else
		{	//Es primera ver que se va ha registrar
			//echo "es primera vez";
			//var_dump($datos);
			$this->redirectToAction('EstadosTorrefaccion', "iniciar_primer_proceso", $datos);
		}
				
	}

	public function consultar_proceso_sig($datos){
		//declaro las variables para los proceso

		$PLP="Pruebas de Laboratorio";
		$ETP="Estados de torrefacción"; 	
		
		$estadoDb=$datos['codigoEstado'];
		
		// obtener los estados las primeras dos letras
		$proceso=substr($estadoDb,0,2);

		//var_dump($estadoDb);
		
		// ESTA EN PROCESO TRILLA	
		if ($proceso=="TR"){ 		
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);

			if ($ultimaletra=='F') {
				
				echo "ultimaletra:".' '.$ultimaletra;

				$datos["proceSg"]=$PLP;

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
			if ($ultimaletra=='P') {
				var_dump($ultimaletra);

				echo "ultimaletra:".' '.$ultimaletra;
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

		}

		// ESTA EN PRUEBAS DE LABORATORIO
		if ($proceso=="PL") {
			var_dump($proceso);
			echo "Pruebas de Laboratorio";
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
		}

		// ESTA EN PROCESO TORREFACTOR	
		if($proceso=="TO"){
			var_dump($proceso);
			echo "TORREFACTO";
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
		}
		// ESTA EN PROCESO TESTABILIZACIÓN DEL CAFÉ
		if($proceso=="EC"){
			var_dump($proceso);
			echo "ESTABILIZACION DEL CAFE";
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
		}
		// ESTA EN LABORATORIO
		if($proceso=="LA"){
			var_dump($proceso);
			echo "LABOLARORIO";

			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
		}
		// ESTA EN EMPAQUE
		if($proceso=="EM"){
			var_dump($proceso);
			echo "EMPAQUE";

			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
		}
		
	}

	public function iniciar_primer_proceso($datos){

		$iniciar="Proceso de Trilla";
		$TRP="TRP";

		//recupero los datos y los vuelvo a meter en un array

		//var_dump($datos);
		$datos["proceso"]=$iniciar;
		$datos["nombreProceso"]=$TRP;

		//echo 'iniciar primer proceso';

		$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
	}

	//Se va ha registrar el inicio del proceso Trilla(TR) y es estado seria en 'proceso'(P)
	public function registrar_inicio_Trilla($idcafe){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;

			}

			$id = $this->TorrefaccionModelo->registrar_inicioTrilla($idcafe);

				if($id==0){
					
					$this->vista('/Trilla/agregar_datos', $idcafe);
					return;
				}
				else{
					
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/iniciar_primer_proceso', $idcafe);
					//return;

					echo "NO";
					
				}

			
	}


	
	
}


?>
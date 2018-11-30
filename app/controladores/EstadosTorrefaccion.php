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

	public function index()
	{
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
	public function registrar_inicio($datos=[])
	{
			//validacion de rol
		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
		{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
			//me retorna a la vista.
			$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);	
	}

	public function validar_cafeExiste()
	{
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

			//obtengo los datos del café que necesito
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
	
	//---------------------------------------

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

				//var_dump($estados);

				$datos=[
						'idestadosTorrefaccion'=>$estados->idestadosTorrefaccion,
						'idcafe'=>$estados->idcafe,
						'codigoEstado'=>$estados->codigoEstado,
						'codigoCafe'=>$estados->codigoCafe,

				];
				
				//echo "tiene uno o varios estados";
				$this->redirectToAction('EstadosTorrefaccion', "consultar_proceso_sig", $datos);
		}else
		{	//Es primera ver que se va ha registrar
				
			$this->redirectToAction('EstadosTorrefaccion', "iniciar_primer_proceso", $datos);
		}			
	}

	public function consultar_proceso_sig($datos){
		//declaro las variables para los proceso
		//var_dump($datos);
		$estadoDb=$datos['codigoEstado'];
		
		// obtener los estados las primeras dos letras
		$proceso=substr($estadoDb,0,2);//images

		//var_dump($estadoDb);
		
		// ESTA EN PROCESO TRILLA	
		if ($proceso=="TR"){ 		
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);

			if ($ultimaletra=='P') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Trilla";
				
				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="TRD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TRF";

				$datos["nombreModificar"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='D') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Trilla";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TRF";

				$datos["nombreReanudar"]="Reanudar proceso";
				$datos["codigoReanudar"]="TRR";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='R') {


				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Trilla";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TRF";

				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="TRD";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='F') {

				$datos['leyenda']=" ha finalizado  el proceso de Trilla, el proceso siguiente es ";
				$datos['nombreProceso']="Pruebas de Laboratorio";
				
				$datos["nombreSiguiente"]="Iniciar Pruebas de Laboratorio";
				$datos["codigoSiguiente"]="PLP";

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}			
		}

		// ESTA EN PRUEBAS DE LABORATORIO
		if ($proceso=="PL") {
			//var_dump($proceso);
			//echo "Pruebas de Laboratorio";
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
			if ($ultimaletra=='P') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Pruebas de Laboratorio";
				
				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="TRD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TRF";

				$datos["nombreModificarP"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
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
		//var_dump($datos);		
		$datos['leyenda']=" no tiene registrado ningún proceso, el primer proceso a registrar es ";
		$datos["nombreProceso"]="TRILLA";
		$datos["nombreSiguiente"]="Iniciar el proceso de Trilla";
		
		$datos["codigoSiguiente"]="TRP";

		$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
	}

	//Se va ha registrar el inicio del proceso Trilla(TR) y es estado seria en 'proceso'(P)
	public function cambiar_estado($idcafe,$codigoSiguiente){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
		//echo $idcafe;
		//echo $codigoSiguiente;

		$codigoCafe=$this->cafesModelo->consultar_x_idCafe($idcafe);

		$datos=[
			'codigoCafe'=>$codigoCafe->codigoCafe,			
		];

		$datos['idcafe']=$idcafe;
		$datos['codigoSiguiente']=$codigoSiguiente;
		//var_dump($datos);

		if($codigoSiguiente=="TRP"){
			//var_dump($datos);
			$this->redirectToAction('DatosTrilla', "mostrar_formulario_trilla",$datos );

		}
		if($codigoSiguiente=="PLP"){

			echo "Registrar";
			$this->redirectToAction('DatosPruebasLaboratorio', "mostrar_formulario",$datos );
		}

	}
	public function detener_estado($idcafe,$codigoDetener){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
	
	
		$datos['idcafe']=$idcafe;
		$datos['codigoDetener']=$codigoDetener;//TRD

		//$proceso=substr($estadoDb,0,2);

		if($codigoDetener=="TRD"){	
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso de trilla';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}
		
	}
	
	public function reanudar_estado($idcafe,$codigoReanudar){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
	
	
		$datos['idcafe']=$idcafe;
		$datos['codigoReanudar']=$codigoReanudar;//TRR

		//$proceso=substr($estadoDb,0,2);

		if($codigoReanudar=="TRR"){	
			$id = $this->TorrefaccionModelo->insertarEstado_reanudado($idcafe,$codigoReanudar);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso de trilla';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}
		
	}
	public function finalizar_estado($idcafe,$codigoFinalizar){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}
	
	
		$datos['idcafe']=$idcafe;
		$datos['codigoFinalizar']=$codigoFinalizar;//TRR

		//$proceso=substr($estadoDb,0,2);

		if($codigoFinalizar=="TRF"){	
			$id = $this->TorrefaccionModelo->insertar_finalizarEstado($idcafe,$codigoFinalizar);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso de trilla';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}
		
	}
	
	
}


?>
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
				$datos["codigoDetener"]="PLD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="PLF";

				$datos["nombreModificarP"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
			if ($ultimaletra=='D') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Pruebas de Laboratorio";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="PLF";

				$datos["nombreReanudar"]="Reanudar proceso";
				$datos["codigoReanudar"]="PLR";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='R') {


				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Pruebas de Laboratorio";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="PLF";

				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="PLD";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='F') {

				$datos['leyenda']=" ha finalizado  el proceso de Pruebas de Laboratorio, el proceso siguiente es ";
				$datos['nombreProceso']="Torrefactor";
				
				$datos["nombreSiguiente"]="Iniciar Torrefactor";
				$datos["codigoSiguiente"]="TOP";

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}			

		}

		// ESTA EN PROCESO TORREFACTOR	
		if($proceso=="TO"){
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
			if ($ultimaletra=='P') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Torrefactor";
				
				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="TOD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TOF";

				$datos["nombreModificarTo"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
			if ($ultimaletra=='D') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']=">Torrefactor";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TOF";

				$datos["nombreReanudar"]="Reanudar proceso";
				$datos["codigoReanudar"]="TOR";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='R') {


				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Torrefactor";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="TOF";

				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="TOD";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='F') {

				$datos['leyenda']=" ha finalizado  el proceso de Torrefactor, el proceso siguiente es ";
				$datos['nombreProceso']="Estabilización";
				
				$datos["nombreSiguiente"]="Iniciar proceso de Establilizacion";
				$datos["codigoSiguiente"]="ESP";

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}			

		}
		// ESTA EN PROCESO TESTABILIZACIÓN DEL CAFÉ
		if($proceso=="ES"){

			$ultimaletra=substr($estadoDb, -1);

			if ($ultimaletra=='P') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Estabilización";
				
				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="ESD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="ESF";

				$datos["nombreModificarEs"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
			if ($ultimaletra=='D') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Estabilización";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="ESF";

				$datos["nombreReanudar"]="Reanudar proceso";
				$datos["codigoReanudar"]="ESR";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='R') {


				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Estabilización";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="ESF";

				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="ESD";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='F') {

				$datos['leyenda']=" ha finalizado  el proceso de Establilizacion, el proceso siguiente es ";
				$datos['nombreProceso']="Laboratorio";
				
				$datos["nombreSiguiente"]="Iniciar proceso de laboratorio";
				$datos["codigoSiguiente"]="LAP";

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
		}
		// ESTA EN LABORATORIO
		if($proceso=="LA"){
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
			if ($ultimaletra=='P') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Laboratorio";
				
				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="LAD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="LAF";

				$datos["nombreModificarLa"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
			if ($ultimaletra=='D') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="laboratorio";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="LAF";

				$datos["nombreReanudar"]="Reanudar proceso";
				$datos["codigoReanudar"]="LAR";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='R') {


				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="laboratorio";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="LAF";

				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="LAD";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='F') {

				$datos['leyenda']=" ha finalizado  el proceso de laboratorio, el proceso siguiente es ";
				$datos['nombreProceso']="Empaque";
				
				$datos["nombreSiguiente"]="Iniciar proceso de Empaque";
				$datos["codigoSiguiente"]="EMP";

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
		}
		// ESTA EN EMPAQUE
		if($proceso=="EM"){
			//obtengo La ultima letra del proceso
			$ultimaletra=substr($estadoDb, -1);
			if ($ultimaletra=='P') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Empaque";
				
				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="EMD";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="EMF";

				$datos["nombreModificarEm"]="Modificar datos ";
	
				
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
			if ($ultimaletra=='D') {

				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Empaque";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="EMF";

				$datos["nombreReanudar"]="Reanudar proceso";
				$datos["codigoReanudar"]="EMR";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='R') {


				$datos['leyenda']=" está en el proceso de ";
				$datos['nombreProceso']="Empaque";
				
				$datos["nombreFinalizar"]="Finalizar proceso";
				$datos["codigoFinalizar"]="EMF";

				$datos["nombreDetener"]="Detener proceso";
				$datos["codigoDetener"]="EMD";
					
				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}

			if ($ultimaletra=='F') {

				$datos['leyenda']=" ha finalizado el último estado que es Empaque. Para finalizar el proceso de";
				$datos['nombreProceso']="Torrefacción";
				
				$datos["nombreSiguiente"]="Finalizar proceso";
				$datos["codigoSiguiente"]="GTF";//GESTION DE TORREFACCIÓN FINALIZADO.

				$this->vista('/EstadosTorrefaccion/registrar_mostrar_estado', $datos);
			}
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

	//Se cambia el estado de cualquier proceso.(Se registra el inicio de cualquier proceso.)
	public function cambiar_estado($idcafe,$codigoSiguiente){

		if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
		}

		$codigoCafe=$this->cafesModelo->consultar_x_idCafe($idcafe);

		$datos=[
			'codigoCafe'=>$codigoCafe->codigoCafe,			
		];

		$datos['idcafe']=$idcafe;
		$datos['codigoSiguiente']=$codigoSiguiente;

		if($codigoSiguiente=="TRP"){
			$this->redirectToAction('DatosTrilla', "mostrar_formulario_trilla",$datos );

		}
		if($codigoSiguiente=="PLP"){

			$this->redirectToAction('DatosPruebasLaboratorio', "mostrar_formulario",$datos );
		}

		if($codigoSiguiente=="TOP"){
			$this->redirectToAction('DatosTorrefactor', "mostrar_formulario",$datos );
		}
		if($codigoSiguiente=="ESP"){
			$this->redirectToAction('DatosEstabilizacion', "mostrar_formulario",$datos );
		}
		if($codigoSiguiente=="LAP"){
			$this->redirectToAction('DatosLaboratorio', "mostrar_formulario",$datos );
		}
		if($codigoSiguiente=="EMP"){
			$this->redirectToAction('DatosEmpaque', "mostrar_formulario",$datos );
		}

	}

	//Se registra la detención de cualquier proceso.
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
		$datos['codigoDetener']=$codigoDetener;

		//$proceso=substr($estadoDb,0,2);

		if($codigoDetener=="TRD"){	
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha detenido el proceso de trilla';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}

		if ($codigoDetener=="PLD") {
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha detenido el proceso Pruebas de Laboratorio';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
		}
		if ($codigoDetener=="TOD") {
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha detenido el proceso Pruebas de Laboratorio';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
		}

		if ($codigoDetener=="ESD") {
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha detenido el proceso Pruebas de Laboratorio';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
		}
		if ($codigoDetener=="LAD") {
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha detenido el proceso Pruebas de Laboratorio';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
		}
		if ($codigoDetener=="EMD") {
			$id = $this->TorrefaccionModelo->insertarEstado_detenido($idcafe,$codigoDetener);

				if($id==1){

					$datos['mensaje_exito']='Se ha detenido el proceso Pruebas de Laboratorio';
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

	//se reanuda cualquier proceso
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
		if($codigoReanudar=="PLR"){	
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
		if($codigoReanudar=="TOR"){	
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
		if($codigoReanudar=="ESR"){	
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
		if($codigoReanudar=="LAR"){	
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
		if($codigoReanudar=="EMR"){	
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

	//se registra el proceso finalizado de caulquier estado.
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
		if($codigoFinalizar=="PLF"){	
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

		if($codigoFinalizar=="TOF"){	
			$id = $this->TorrefaccionModelo->insertar_finalizarEstado($idcafe,$codigoFinalizar);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso Torrefactor';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}
		if($codigoFinalizar=="ESF"){	
			$id = $this->TorrefaccionModelo->insertar_finalizarEstado($idcafe,$codigoFinalizar);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso Torrefactor';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}
		if($codigoFinalizar=="LAF"){	
			$id = $this->TorrefaccionModelo->insertar_finalizarEstado($idcafe,$codigoFinalizar);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso Torrefactor';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
				}
				else{
					$datos['mensaje_exito']='NO se puede ejecutar el proceso';
					//$datos['mensaje_advertencia'] ='no se realizo el insert';
					$this->vista('/EstadosTorrefaccion/registrar_inicio', $datos);
					return;
					
				}
			
		}
		if($codigoFinalizar=="EMF"){	
			$id = $this->TorrefaccionModelo->insertar_finalizarEstado($idcafe,$codigoFinalizar);

				if($id==1){

					$datos['mensaje_exito']='Se ha registrado el proceso Torrefactor';
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
<?php

/**
* 
*/
	class Recepciones extends Controlador
	{
		
		function __construct()
		{
			$this->recepcionModelo = $this->modelo('Recepcion');
			$this->personaModelo = $this->modelo('Persona');
			$this->fincaModelo = $this->modelo('Finca');
			$this->cafeModelo = $this->modelo('Cafe');
		}


		public function index($pagina=1,$mensaje='',$error=''){

			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			 	
			if(!empty($error))
			{
				$datos['mensaje_error'] =$error;
			}

			if(!empty($mensaje))
			{
				$datos['mensaje_advertencia'] =$mensaje;
			}
			
			//echo $pagina;
			$recepciones_x_pagina=5;			
			
			//obtener los usuarios
			$iniciar=($pagina-1)*$recepciones_x_pagina ;
			

			$recepciones=$this->recepcionModelo->limit_recepciones($iniciar,$recepciones_x_pagina);

			$datos["recepciones"]=$recepciones;

			$total_recepciones_db=$this->recepcionModelo->contar_recepciones();
			
			//calculo es total de paginas
			$paginas=$total_recepciones_db->cuenta/$recepciones_x_pagina;
			$numeroPaginas= ceil($paginas);

			$datos['numeroPaginas']=$numeroPaginas;
			//echo $numeroPaginas;
			$datos["pagina"]=$pagina;

			$this->vista('/Recepciones/index',$datos);
		}



		//muestra formulario vacio (GET - click en en link registrar recepcion)
		// solo campo identificacion y boton buscar
		public function registrar_nueva(){
			$datos=[				
					
					'documentoIdentidad'=> '',
				];

			$this->vista('/Recepciones/registrar_nueva', $datos);			
		}

		//busca el cliente con el numero de documento enviado (POST - submit boton consultar) 
		// si cliente existe muestra formulario  campos solo lectura del cliente y lista de fincas para que usuario seleccione finca, y muestra boton siguiente (seleccionar finca)
		public function registrar_consultar(){
		//consultamos el cliente si existe
			if($this->personaModelo->clienteExiste( $_POST['documentoIdentidad'] ) ){

				$cliente= $this->personaModelo->obtenerClienteDocumento( $_POST['documentoIdentidad']);

				$datos=[				
						'idPersona'			=> $cliente->idPersona,				
						'primerNombre'		=> $cliente->primerNombre,
						'segundoNombre'		=> $cliente->segundoNombre,
						'primerApellido'	=> $cliente->primerApellido,
						'segundoApellido'	=> $cliente->segundoApellido,
						'documentoIdentidad'=> $cliente->documentoIdentidad,
						'correo'			=> $cliente->correo,
						'numeroContacto'	=> $cliente->numeroContacto,
						'direccion'			=> $cliente->direccion,

					];

					$datos["idCliente"]=$cliente->idPersona;

					//se obtienen array (php) de objetos para el select
					$fincas=$this->fincaModelo-> obtenerFincasCliente($cliente->idPersona);
					// se convierte en string que representa un array de javascript
					$fincas = json_encode($fincas);
					// se envia en variable para que la vista tenga disponible los datos para los script de javascript
					$datos["fincas"]=$fincas;
					
					//var_dump($datos);

				//var_dump($datos);

			 $this->vista('/Recepciones/registrar_consultar', $datos);
			}else
			{
				//NO se hizo submit al boton Consultar
				$mensaje_error=array('mensaje_error'=>'El cliente no esta registrado');
				$this->vista('/Recepciones/registrar_nueva', $mensaje_error);
			}
			var_dump($datos);
		}

		// despues de agregar las fincas (Fincas/agregar) se llama a este metodo desde alla (POST) para guardar todos los datos (cliente y fincas) en una sola transaccion
		public function crear_guardar(){

			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			// recupero y guardo de nuevo datos del cliente (vienen de los hidden y van para los hidden de nuevo)
			$datos["idCliente"]=$_POST['idCliente'];
			$datos['idDetalleFinca']=$_POST['idDetalleFinca'];
			$datos["correo"]=$_POST['correo'];
			$datos['direccion']=$_POST['direccion'];
			$datos['Temperatura']=$_POST['Temperatura'];
			
			
			// recupero y guardo en variable losdatos del cliente (vienen desde fincas/agregar)
	
				$datos=[				
					'idCliente'		=>trim($_POST['idCliente']),
					'idDetalleFinca'		=>trim($_POST['idDetalleFinca']),
					'correo'	=>trim($_POST['correo']),
					'direccion'	=>trim($_POST['direccion']),
					'Temperatura'	=>trim($_POST['Temperatura'])
				];
				
				//
				$numero= $this->recepcionModelo->agregarNueva($datos);

				if($numero== -1){
					// no se ejecutó el insert
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/Recepciones/registrar_nueva', $datos);
					return;
				}
				else{

					// Sí se realizó el insert, se redirecciona a la lista de clientes. Y se envia el último ID del cliente registrado.
					//redireccionar('/fincas/agregar');

					//recupero datos de las fincas que se han creado temporalmente (guardadas en el hidden y no se han guardado en BD)
					$datos["lotesArr"]=json_decode($_POST["lotesJson"]);

					//var_dump($datos["lotesArr"]);
					// inserto las fincas en una sola transaccion, mano id de cliente creado
						if(!$this->cafeModelo->agregarLotes($datos["lotesArr"], $numero, trim($_POST['idCliente']))){
							
							// no se inserto ninguna, elimino al cliente para que no quede incompleto
							$this->RecepcionModelo->eliminarRecepcionNumero($numero);
							// agrego mensaje a arreglo de datos para ser mostrado 
							$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
							
							//retorna a vista de creacion del cliente}
							$this->vista('/Recepciones/registrar_nueva', $datos);
							return;
						}

					// no hubo ningun problema , redirecciono a formulario de creacion de cliente vacio e indicando que hubo exito 
					$datos['mensaje_informacion'] = 'Exito al guardar la nueva recepcion.';
					//$this->index(1,'Exito al guardar la nueva recepcion.');
					$this->vista('/Recepciones/generarRecibo', $datos);
					
				}
			/*
			Si no ha sido enviado por el metodo POST. Es porque se va hacer por primera vez un registro.
				
			*/	
			
		}
		

		/*

		//me llega el cliente y la finca seleccionada (campos hidden) (POST - submit boton "agregra cafe") 
		// si cliente existe muestra formulario  campos solo lectura del cliente y lista de fincas para que usuario seleccione finca, mostrar boton siguiente (agregar cafe)
		public function agregar_finca_seleccionada($datos){
		//consultamos el cliente si existe
		$cliente=$this->personaModelo->obtenerClienteDocumento($documento);
				
				$datos=[
					'idPersona'=> $cliente->idPersona,				
				];
			$this->vista('/Recepciones/registrar_agregar_cafes', $datos);
			
		}
		*/



		public function detalle($idRecepcion){
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			//consulatos los datos de la recepcion
			$datosRecepcion= $this->recepcionModelo->ConsultarDatos_x_id($idRecepcion);
				
					$datos=[
						//'codigoRecibo'	=> $datosRecepcion->codigorecibo,
						'fecha'	=> $datosRecepcion->created_at,	
						'primerNombre'	=> $datosRecepcion->primerNombre,
						'primerApellido'	=> $datosRecepcion->primerApellido,
						'documentoIdentidad'	=> $datosRecepcion->documentoIdentidad,
						'direccion'	=> $datosRecepcion->direccion,
						'numeroContacto'	=> $datosRecepcion->numeroContacto,
						'correo'	=> $datosRecepcion->correo,
						'nombreFinca'=>$datosRecepcion->nombreFinca,
						'municipio'=>$datosRecepcion->municipio,
						'Vereda'=>$datosRecepcion->vereda,
						'temperatura'	=> $datosRecepcion->temperatura,										

					];

			//consulto datos de los  cafés registrados  a esa recepción
			$datos["lotes"] = $this ->cafeModelo ->obtenerCafesRecepcion($idRecepcion);				

					$this->vista('/recepciones/detalle', $datos);

		}

		public function mostrar_opcion_foto($idRecepcion){
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			//consulatos los datos de la recepcion
			$datosRecepcion= $this->recepcionModelo->ConsultarDatos_x_id($idRecepcion);
				
					$datos=[
						'numeroRecibo'	=> $datosRecepcion->numeroRecibo,
						'fecha'	=> $datosRecepcion->created_at,	
						'primerNombre'	=> $datosRecepcion->primerNombre,
						'primerApellido'	=> $datosRecepcion->primerApellido,
						'documentoIdentidad'	=> $datosRecepcion->documentoIdentidad,
						'direccion'	=> $datosRecepcion->direccion,
						'numeroContacto'	=> $datosRecepcion->numeroContacto,
						'correo'	=> $datosRecepcion->correo,
						'nombreFinca'=>$datosRecepcion->nombreFinca,
						'municipio'=>$datosRecepcion->municipio,
						'Vereda'=>$datosRecepcion->vereda,
						'temperatura'	=> $datosRecepcion->temperatura,										

					];

			//consulto datos de los  cafés registrados  a esa recepción
			$datos["lotes"] = $this ->cafeModelo ->obtenerCafesRecepcion($idRecepcion);				

					$this->vista('/recepciones/detalle_foto_lote', $datos);

		}


}
?>
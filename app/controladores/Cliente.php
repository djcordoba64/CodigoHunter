<?php 

	/**
	* 
	*/

	class Cliente extends Controlador
	{
		
		function __construct()
		{
			//instanciamos la clase del modelo Persona.
			$this->personaModelo = $this->modelo('Persona');
			$this->fincaModelo = $this->modelo('Finca');

			$this->UbicacionModelo = $this->modelo('Ubicacion');
			
	
		}

		//$mensaje='',$error=''
		public function index($pagina=1){
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			/*
			if(!empty($error))
			{
				$datos['mensaje_error'] =$error;
			}

			if(!empty($mensaje))
			{
				$datos['mensaje_advertencia'] =$mensaje;
			}
			*/

			//echo $pagina;
			$clientes_x_pagina=3;			
			
			//obtener los usuarios
			$iniciar=($pagina-1)*$clientes_x_pagina ;
			//echo $iniciar;

			$personas=$this->personaModelo->obtenerClienteLimit($iniciar,$clientes_x_pagina);

			$datos["personas"]=$personas;

			//contar los usuarios de nuestra base d edatos
			$total_clientes_db=$this->personaModelo->contarClientes();

			//echo $total_clientes_db->cuenta;
			//var_dump($datos);
			
			//calculo es total de paginas
			$paginas=$total_clientes_db->cuenta/$clientes_x_pagina;
			$numeroPaginas= ceil($paginas);

			$datos['numeroPaginas']=$numeroPaginas;
			//echo $numeroPaginas;
			$datos["pagina"]=$pagina;
			
			//echo var_dump($datos);
			$this->vista('/Cliente/index',$datos);
			
		}
		//-------------------****CREAR UN CLIENTE****--------------------------------------
		
		//muestra formulario con los campos vacios (GET)
		public function crear_mostrar_formulario(){


			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			
				$datos=[				
					'primerNombre'		=> '',
					'segundoNombre'		=> '',
					'primerApellido'	=> '',
					'segundoApellido'	=> '',
					'documentoIdentidad'=> '',
					'fechaNacimiento'	=> '',
					'sexo'				=> '',
					'correo'			=> '',
					'numeroContacto'	=> '',
					'direccion'			=> '',
					'estado'			=> '',	

				];
				//Nos redirecciona a la vista agregar--(formulario de registro de un cliente)
				$this->vista('/Cliente/crear', $datos);
		}

		//al dar clic en siguiente, valida que el cliente no exista, y procede a cargar la vista de agregar fincas
		//le manda a esa vista los datos del cliente ingresados para que sean guardados en campos hidden y poder guardarlos al final con las fincas
		public function crear_validar_mostrar_fincas(){


			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
		
				// guardo los datos para pasarselos a la vista de agregar finca y puedan ser guardados despues
				$datos=[				
					'primerNombre'		=>trim($_POST['primerNombre']),
					'segundoNombre'		=>trim($_POST['segundoNombre']),
					'primerApellido'	=>trim($_POST['primerApellido']),
					'segundoApellido'	=>trim($_POST['segundoApellido']),
					'documentoIdentidad'=>trim($_POST['documentoIdentidad']),
					'fechaNacimiento'	=>trim($_POST['fechaNacimiento']),
					'sexo'				=>trim($_POST['sexo']),
					'correo'			=>trim($_POST['correo']),
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),
					'estado'			=>trim($_POST['estado']),	
				];
				
				//valida
				if($this->personaModelo->clienteExiste( $_POST['documentoIdentidad'] ))
				{
					// El cliente ya existe
					// agrego mensaje al arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='El usuario ya existe, el número de identificación ya esta registrado';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
					$this->vista('/Cliente/crear', $datos);
					return;

				}
					
					//redirecciono a fincas formulario vacio y le paso datos de cliente 
					$this->redirectToAction('Fincas', "agregar_formulario_inicial", $datos);			
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

			
			
			// recupero y guardo en variable losdatos del cliente (vienen desde fincas/agregar)
	
				$datos=[				
					'primerNombre'		=>trim($_POST['primerNombre']),
					'segundoNombre'		=>trim($_POST['segundoNombre']),
					'primerApellido'	=>trim($_POST['primerApellido']),
					'segundoApellido'	=>trim($_POST['segundoApellido']),
					'documentoIdentidad'=>trim($_POST['documentoIdentidad']),
					'fechaNacimiento'	=>trim($_POST['fechaNacimiento']),
					'sexo'				=>trim($_POST['sexo']),
					'correo'			=>trim($_POST['correo']),
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),
					'estado'			=>trim($_POST['estado']),	
				];
				
				//
				$idCliente= $this->personaModelo->agregarCliente($datos);

				

				if($idCliente==-2)
				{
					// El cliente ya existe
					// agrego mensaje al arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='El usuario ya existe, el numero de identificacion ya esta registrado';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
					$this->vista('/Cliente/crear', $datos);
					return;
				}
				else if($idCliente== -1){
					// no se ejecutó el insert
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/Cliente/crear', $datos);
					return;
				}
				else{

					// Sí se realizó el insert, se redirecciona a la lista de clientes. Y se envia el último ID del cliente registrado.
					//redireccionar('/fincas/agregar');

					//recupero datos de las fincas que se han creado temporalmente (guardadas en el hidden y no se han guardado en BD)
					$datos["fincasArr"]=json_decode($_POST["fincasJson"]);

					// inserto las fincas en una sola transaccion, mano id de cliente creado

						if(!$this->fincaModelo->agregarFincas($datos["fincasArr"], $idCliente)){
							
							// no se inserto ninguna, elimino al cliente para que no quede incompleto
							$this->personaModelo->eliminarClienteId($idCliente);
							// agrego mensaje a arreglo de datos para ser mostrado 
							$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
							
							//retorna a vista de creacion del cliente}
							$this->vista('/Cliente/crear', $datos);
							return;
						}

					// no hubo ningun problema , redirecciono a formulario de creacion de cliente vacio e indicando que hubo exito 

					$this->index('Exito al guardar el nuevo cliente.');
					
					
				}
			/*
			Si no ha sido enviado por el metodo POST. Es porque se va hacer por primera vez un registro.
				
			*/	
			
		}

		
		//----------------------------------------------------------------------------------------
		//Ver detalle del cliente

		public function detalle($idPersona){
			
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados.
				$this->vista('/paginas/index',$datos);
				return;
			}
			//var_dump($idPersona);
			$cliente=$this->personaModelo->obtenerClienteID($idPersona);
				
				$datos=[
					'idPersona'			=> $cliente->idPersona,				
					'primerNombre'		=> $cliente->primerNombre,
					'segundoNombre'		=> $cliente->segundoNombre,
					'primerApellido'	=> $cliente->primerApellido,
					'segundoApellido'	=> $cliente->segundoApellido,
					'documentoIdentidad'=> $cliente->documentoIdentidad,
					'fechaNacimiento'	=> $cliente->fechaNacimiento,
					'sexo'				=> $cliente->sexo,
					'correo'			=> $cliente->correo,
					'numeroContacto'	=> $cliente->numeroContacto,
					'direccion'			=> $cliente->direccion,								
					'estado'			=> $cliente->estado,
					


				];
				//var_dump($datos);
				//consulto datos para la tabla de fincas registradas para el cliente
				$datos["fincas"] = $this -> fincaModelo -> obtenerFincasCliente($idPersona);

				//var_dump($datos);
				
			$this->vista('/Cliente/detalle', $datos);

		}

		//---------editar datos del cliente-------------

		public function editar($idPersona){

			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error'])){
				//es un submit y no es la redireccion despues de haber encontrado un error al actualizar el usuario (no existe mensaje de error entre los parametros)
				$datos=[
					'idPersona'			=>$idPersona,				
					'primerNombre'		=>trim($_POST['primerNombre']),
					'segundoNombre'		=>trim($_POST['segundoNombre']),
					'primerApellido'	=>trim($_POST['primerApellido']),
					'segundoApellido'	=>trim($_POST['segundoApellido']),
					'documentoIdentidad'=>trim($_POST['documentoIdentidad']),
					'fechaNacimiento'	=>trim($_POST['fechaNacimiento']),
					'sexo'				=>trim($_POST['sexo']),
					'correo'			=>trim($_POST['correo']),
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),
					'estado'			=>trim($_POST['estado']),				
				];

				//SE EJECUTA EL MÉTODO 	editarUsuario() del Modelo Persona.
				$id = $this->personaModelo->editarCliente($datos);
				if($id==-1){
					// no se ejecutó el update
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/Cliente/editar', $datos);
					return;

				}
				else{

					redireccionar('/Cliente/index');
				}

			}
			else
			{
				if(empty($datos)){
					$cliente=$this->personaModelo->obtenerClienteID($idPersona);
				
					$datos=[
						'idPersona'			=> $cliente->idPersona,				
						'primerNombre'		=> $cliente->primerNombre,
						'segundoNombre'		=> $cliente->segundoNombre,
						'primerApellido'	=> $cliente->primerApellido,
						'segundoApellido'	=> $cliente->segundoApellido,
						'documentoIdentidad'=> $cliente->documentoIdentidad,
						'fechaNacimiento'	=> $cliente->fechaNacimiento,
						'sexo'				=> $cliente->sexo,
						'correo'			=> $cliente->correo,
						'numeroContacto'	=> $cliente->numeroContacto,
						'direccion'			=> $cliente->direccion,								
						'estado'			=> $cliente->estado,
					];
					//var_dump($datos);
					//consulto datos para la tabla de fincas registradas para el cliente
					$datos["finca"] = $this -> fincaModelo -> obtenerFincasCliente($idPersona);
				}
	
				$this->vista('/Cliente/editar', $datos);

			}
			

		}

	}
 ?>
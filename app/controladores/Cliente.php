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

			$this->UbicacionModelo = $this->modelo('Ubicacion');
		}

		public function index(){
			//validacion de rol
			if($_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			//obtener la lista de los clientes
			$personas=$this->personaModelo->obtenerClientes();

			$datos=[
				
			'personas'=> $personas
			];
			//echo var_dump($datos);
			$this->vista('/Cliente/index',$datos);
			
		}
		//-------------------****CREAR UN CLIENTE****--------------------------------------
		
		public function crear(){


			//validacion de rol
			if($_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			/*
			Si se ha enviado el formulario por el método POST. Guardamos la información ingresada en una variable.
			*/ 
			if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error'])){

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
				/*
				Si los datos fueron enviador correcatmente ejecutamos el método agregarCliente()
				*/
			
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

				 	//var_dump($datos);
					// Si se realizo el insert, se redirecciona a la lista de crear Finca. Y se envia el último ID del cliente registrado.
					//redireccionar('/fincas/agregar');

					$datos["idCliente"]=$idCliente;


					$deptos = $this->UbicacionModelo -> obtenerDepartamentos();
					$deptos = json_encode($deptos);
					$municipios = $this->UbicacionModelo -> obtenerMunicipios();
					$municipios = json_encode($municipios);

					$datos["deptos"]=$deptos;
					$datos["municipios"]=$municipios;

					$this->vista('/Fincas/agregar', $datos);
					
					
				}
			/*
			Si no ha sido enviado por el metodo POST. Es porque se va hacer por primera vez un registro.
				
			*/	
			}else{
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

		}
		//----------------------------------------------------------------------------------------








	}




 ?>
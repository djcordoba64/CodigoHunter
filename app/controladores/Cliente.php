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
		}

		public function index(){
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
			/*
			Si se ha enviado el formulario por el método POST. Guardamos la información ingresada en una variable.
			*/ 
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){

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
				y guardamos el documento de identidad en una variable de sesión.
				*/
				if($this->personaModelo->agregarCliente($datos)){
					//echo $ultimoIdCliente;
					redireccionar('/Fincas/agregar');
					echo var_dump($datos);
				}else{
					die ('Algo salio mal');
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
				//Nos redirecciona a la vista agregar--(formulario de registro de un usuario)
				$this->vista('/Cliente/crear', $datos);
			}

		}
		//----------------------------------------------------------------------------------------








	}




 ?>
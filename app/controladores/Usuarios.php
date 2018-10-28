<?php 
	
	class Usuarios extends Controlador {

		public function __construct(){
			//instanciamos la clase del modelo.
			$this->personaModelo = $this->modelo('Persona');
			

		}
		public function index(){
			//obtener los usuarios
			$personas=$this->personaModelo->obtenerUsuarios();

			$datos=[
				
				'personas'=> $personas
			];
			$this->vista('/Usuarios/index',$datos);
		}


//--------------------------***AGREGAR UN USUARIO***------------------------------------------
		
		public function agregar(){

			//NOS VALIDA SI EL FORMULARIO HA SIDO ENVIADO ---CRUD con MVC(PDO)-link->https://www.youtube.com/watch?v=rTzwrVQFMHs-------
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
					'usuario'			=>trim($_POST['usuario']),
					'rol'				=>trim($_POST['rol']),
					'contrasena'		=>trim($_POST['contrasena']),
					'confi_Contrasena'	=>trim($_POST['confi_Contrasena']),
					'estado'			=>trim($_POST['estado']),				
				];

				//SE EJECUTA EL MÉTODO crearUsuario() del Modelo Persona.
				if($this->personaModelo->agregarUsuario($datos)){
					redireccionar('/Usuarios/index');
				}else{
					die ('Algo salio mal');
				}

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
					'usuario'			=> '',
					'rol'				=> '',
					'contrasena'		=> '',
					'confi_Contrasena'	=> '',
					'estado'			=> '',				
				];
				//Nos redirecciona a la vista agregar--(formulario de registro de un usuario)
				$this->vista('/Usuarios/agregar', $datos);
			}
		}
//----------------***EDITAR UN USUARIO***---------------------------------------------------------------------			
		//--CRUD con MVC(PDO)-link->https://www.youtube.com/watch?v=8RwF0zDNjbQ--
		public function editar($idPersona){
			///NOS VALIDA SI EL FORMULARIO HA SIDO ENVIADODO POR EL MÉTODO POST,UNA VEZ SE HAYA DADO SUBMIT AL BOTON "ACTUALIZAR"
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){

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
					'usuario'			=>trim($_POST['usuario']),
					'rol'				=>trim($_POST['rol']),
					'contrasena'		=>trim($_POST['contrasena']),
					'estado'			=>trim($_POST['estado']),				
				];

				//SE EJECUTA EL MÉTODO 	editarUsuario() del Modelo Persona.
				if($this->personaModelo->editarUsuario($datos)){
					redireccionar('/Usuarios/index');

				}else{
					die ('Algo salio mal');
					
				}

			}else{
				//Cuando se dio clic en el boton 'Editar' a un registro, se Obtiene la  información del usuario seleccionadao desde el modelo Persona, y se carga la información en el formulario de Actulización.
				$usuario=$this->personaModelo->obtenerUsuarioId($idPersona);
				
				$datos=[
					'idPersona'			=> $usuario->idPersona,				
					'primerNombre'		=> $usuario->primerNombre,
					'segundoNombre'		=> $usuario->segundoNombre,
					'primerApellido'	=> $usuario->primerApellido,
					'segundoApellido'	=> $usuario->segundoApellido,
					'documentoIdentidad'=> $usuario->documentoIdentidad,
					'fechaNacimiento'	=> $usuario->fechaNacimiento,
					'sexo'				=> $usuario->sexo,
					'correo'			=> $usuario->correo,
					'numeroContacto'	=> $usuario->numeroContacto,
					'direccion'			=> $usuario->direccion,
					'usuario'			=> $usuario->usuario,
					'rol'				=> $usuario->rol,
					'contrasena'		=> $usuario->contrasena,					
					'estado'			=> $usuario->estado,	
				];
				//Nos redirecciona a la vista editar---(formulario de modificacón de datos del USUARIO)--
				$this->vista('/Usuarios/editar', $datos);
			}
			
		}

		//----DETALLE USUARIO-----------------------------------------------------------------------------------------
		//Ver detaller del usuario
		public function detalle($idPersona){
			
			$usuario=$this->personaModelo->obtenerUsuarioId($idPersona);
				
				$datos=[
					'idPersona'			=> $usuario->idPersona,				
					'primerNombre'		=> $usuario->primerNombre,
					'segundoNombre'		=> $usuario->segundoNombre,
					'primerApellido'	=> $usuario->primerApellido,
					'segundoApellido'	=> $usuario->segundoApellido,
					'documentoIdentidad'=> $usuario->documentoIdentidad,
					'fechaNacimiento'	=> $usuario->fechaNacimiento,
					'sexo'				=> $usuario->sexo,
					'correo'			=> $usuario->correo,
					'numeroContacto'	=> $usuario->numeroContacto,
					'direccion'			=> $usuario->direccion,
					'usuario'			=> $usuario->usuario,
					'rol'				=> $usuario->rol,
					'contrasena'		=> $usuario->contrasena,					
					'estado'			=> $usuario->estado,

				];
			$this->vista('/Usuarios/detalle', $datos);

		}
		//---------------------------------------------------------

		
		
	}

 ?>
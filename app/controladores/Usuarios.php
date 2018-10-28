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
			//es un submit y no es la redireccion despues de haber encontrado un error al insertar el usuario (no existe mensaje de error entre los parametros)
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
					'rol'				=>trim($_POST['rol']),
					'contrasena'		=>trim($_POST['contrasena']),
					'confi_Contrasena'	=>trim($_POST['confi_Contrasena']),
					'estado'			=>trim($_POST['estado']),				
				];

				//SE EJECUTA EL MÉTODO crearUsuario() del Modelo Persona.
				$id = $this->personaModelo->agregarUsuario($datos);

				if($id==-2)
				{
					// usuario ya existe
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='El usuario ya existe, el numero de identificacion ya esta registrado';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
					$this->vista('/usuarios/agregar', $datos);
					return;
				}
				else if($id== -1){
					// no se ejecutó el insert
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/usuarios/agregar', $datos);
					return;
				}
				else{
					// Si se realizo el insert, se redirecciona a la lista de usuarios
					redireccionar('/Usuarios/index/');
				}

			}
			else 
			{ 
				// es GET (primera carga del formulario, vacio), o se esta cargando el formulario de nuevo con mensaje de error encontrados al insertar el nuevo usuario
				if(empty($datos)){
					//si los datos no se enviaron, mostrar el formulario vacio
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
						'rol'				=> '',
						'contrasena'		=> '',
						'confi_Contrasena'	=> '',
						'estado'			=> '',				
					];
				} //si no, se dejan los datos que vienen.


				//renderiza la pagina con el formulario (lleno vacio)
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
					'confi_Contrasena'		=> $usuario->contrasena,					
					'estado'			=> $usuario->estado,	
				];
				//Nos redirecciona a la vista editar---(formulario de modificacón de datos del USUARIO)--
				$this->vista('/Usuarios/editar', $datos);
			}
			
		}

		//----DETALLE USUARIO-----------------------------------------------------------------------------------------
		//Ver detaller del usuario
		public function detalle(){
			

			$this->vista('/Usuarios/detalle');
		}
		
	}

 ?>
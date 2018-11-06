<?php 
	
	class Usuarios extends Controlador {

		public function __construct(){
			//instanciamos la clase del modelo.
			$this->personaModelo = $this->modelo('Persona');
			

		}
		public function index(){

			//validacion de rol
			if($_SESSION["rol"]!="administrador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			//obtener los usuarios
			$personas=$this->personaModelo->obtenerUsuarios();

			$datos=[
				
				'personas'=> $personas
			];
			$this->vista('/Usuarios/index',$datos);
		}


//--------------------------***AGREGAR UN USUARIO***------------------------------------------
		
		public function agregar(){

			//validacion de rol
			if($_SESSION["rol"]!="administrador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}


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

				//validaciones antes de realizar la operacion:
				if($datos["contrasena"]!=$datos["confi_Contrasena"])
				{					
					// agrego mensaje al arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Las contraseñas no coinciden';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
					$this->vista('/usuarios/agregar', $datos);
					return;
				}

				//SE EJECUTA EL MÉTODO agregarUsuario() del Modelo Persona.
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


				//renderiza la pagina con el formulario (lleno o vacio)
				$this->vista('/Usuarios/agregar', $datos);
			}
		}
//----------------***EDITAR UN USUARIO***---------------------------------------------------------------------			
		//--CRUD con MVC(PDO)-link->https://www.youtube.com/watch?v=8RwF0zDNjbQ--
		public function editar($idPersona){

			//validacion de rol
			if($_SESSION["rol"]!="administrador")
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
					'rol'				=>trim($_POST['rol']),
					'contrasena'		=>trim($_POST['contrasena']),
					'confi_Contrasena'		=>trim($_POST['confi_Contrasena']),
					'estado'			=>trim($_POST['estado']),				
				];

				//validaciones antes de realizar la operacion:
				if($datos["contrasena"]!=$datos["confi_Contrasena"])
				{					
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Las contraseñas no coinciden';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
					$this->vista('/usuarios/editar', $datos);
					return;
				}

				//SE EJECUTA EL MÉTODO 	editarUsuario() del Modelo Persona.
				$id = $this->personaModelo->editarUsuario($datos);
				if($id==-1){
					// no se ejecutó el update
					// agrego mensaje a arreglo de datos para ser mostrado 
					$datos['mensaje_error'] ='Ocurrió un problema al procesar la solicitud';
					// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario intente de nuevo
					$this->vista('/usuarios/editar', $datos);
					return;

				}
				else{
					// exito, redireccionar al index
					redireccionar('/Usuarios/index');
				}

			}
			else
			{
				// es GET (primera carga del formulario, con datos desde la base de datos), o se esta cargando el formulario de edicion con mensajes de error encontrados al editar el usuario
				if(empty($datos)){
					//si los datos no se enviaron, cargar los datos desde la bd
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
						'rol'				=> $usuario->rol,
						'contrasena'		=> $usuario->contrasena,	
						'confi_Contrasena'		=> $usuario->contrasena,					
						'estado'			=> $usuario->estado,	
					];
				}
				//finalmente renderizar a la vista de edicion con los datos sean cargados desde la bd o los enviados por parametros (intento de edicion fallido)
				$this->vista('/Usuarios/editar', $datos);
			}
			
		}

		//----DETALLE USUARIO-----------------------------------------------------------------------------------------
		//Ver detaller del usuario
		public function detalle($idPersona){
			
			//validacion de rol
			if($_SESSION["rol"]!="administrador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

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
					'rol'				=> $usuario->rol,
					'contrasena'		=> $usuario->contrasena,					
					'estado'			=> $usuario->estado,

				];
			$this->vista('/Usuarios/detalle', $datos);

		}
		//---------------------------------------------------------

		
		
	}

 ?>
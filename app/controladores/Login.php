<?php 

	class Login extends Controlador {

			public function __construct(){
			//instanciamos la clase del modelo.
			$this->personaModelo = $this->modelo('Persona');
			

		}
		//Esta funcion al iniciar al sitema lo primero que me muestra es el formulario de inicio de sesion
		public function index($datos=[]){
			$this->vista('/login/index', $datos);
		}

		public function validar(){
			if (empty($_POST['identificacion']) OR empty($_POST['contrasena']))
				{
					$mensaje_error=array('mensaje_error'=>'El numero de identificación y la contraseña son obligatorios');
					$this->vista('/Login/index', $mensaje_error);
					return;
				}

				if($this->personaModelo->credencialesCorrectas( $_POST['identificacion'], $_POST['contrasena']))
				{
					//las credenciales son correctas

					$datosUsuario = $this->personaModelo->obtenerDatosPorIdentificacion( $_POST['identificacion']);

					if($datosUsuario -> estado == 'Activo')
					{
						// el usuario esta activo
						// datos del usuario para realizar y registrar operaciones sobre los datos en la base de datos
						$_SESSION["nombreCompleto"] = $datosUsuario -> primerNombre." ".$datosUsuario -> primerApellido;
						$_SESSION["identificacion"] = $datosUsuario -> documentoIdentidad;	
						$_SESSION["idUsuario"] = $datosUsuario -> idPersona;	
						$_SESSION["rol"] = $datosUsuario -> rol;


						$this->vista('/paginas/index');
					}
					else
					{
						//el suario no esta activo mostrar error
						$mensaje_error=array('mensaje_error'=>'El usuario esta inactivo.');
						$this->vista('/Login/index', $mensaje_error);
					}

				}
				else
				{
					$mensaje_error=array('mensaje_error'=>'El numero de identificación y/o la contraseña son incorrectos');
					$this->vista('/Login/index', $mensaje_error);
				}

		}

		public  function cerrarSesion(){
			session_unset();
			$mensaje_advertencia=array('mensaje_advertencia'=>'Se ha cerrado la sesión correctamente.');
					$this->vista('/Login/index', $mensaje_advertencia);
		}


	}


 ?>
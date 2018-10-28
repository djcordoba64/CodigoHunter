<?php 

	class Login extends Controlador {

			public function __construct(){
			//instanciamos la clase del modelo.
			$this->personaModelo = $this->modelo('Persona');
			

		}
		//Esta funcion al iniciar al sitema lo primero que me muestra es el formulario de inicio de sesion
		public function index(){
			$this->vista('/login/index');
		}

		public function validar(){
			if (empty($_POST['usuario']) OR empty($_POST['contrasena']))
				{
					$mensaje_error=array('mensaje_error'=>'El usuario y la contraseña son obligatorios');
					$this->vista('/Login/index', $mensaje_error);
					return;
				}

				if($this->personaModelo->CredencialesCorrectas( $_POST['usuario'], $_POST['contrasena']))
				{
					$_SESSION["autenticado"] = true;
					$_SESSION["usuario"] = $_POST['usuario'];	

					$datosUsuario = $this->personaModelo->ObtenerDatosPorNombreUsuario( $_POST['usuario']);

					$_SESSION["rol"] = $datosUsuario -> rol;	

					$this->vista('/paginas/index');
				}
				else
				{
					$mensaje_error=array('mensaje_error'=>'El usuario y/o la contraseña son incorrectos');
					$this->vista('/Login/index', $mensaje_error);
				}

		}

		public  function cerrarSesion(){
			session_unset();
			$mensaje_advertencia=array('mensaje_advertencia'=>'Se ha cerrado la sesión correctamente.');
					$this->vista('/Login/index', $mensaje_advertencia);
		}


	}

session_start();

 ?>
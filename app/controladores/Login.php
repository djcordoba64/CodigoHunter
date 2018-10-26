<?php 

	class Login extends Controlador {

			public function __construct(){
			//instanciamos la clase del modelo.
			$this->personaModelo = $this->modelo('Persona');
			

		}
		//Esta funcion al iniciar al sitema lo primero que me muestra es el formulario de inicio de sesion
		public function inicio(){
			$this->vista('/login/login');
		}

		public function validar(){
			if (empty($_POST['usuario']) OR empty($_POST['contrasena']))
				{
					$error_message=array('error_message'=>'El usuario y la contraseña son obligatorios');
					$this->vista('/Login/login', $error_message);
					return;
				}

				if($this->personaModelo->CredencialesCorrectas( $_POST['usuario'], $_POST['contrasena']))
				{
					$_SESSION["autenticado"] = true;
					$_SESSION["usuario"] = $_POST['usuario'];	

					$datosUsuario = $this->personaModelo->ObtenerDatosPorNombreUsuario( $_POST['usuario']);

					$_SESSION["rol"] = $datosUsuario -> rol;	

					$this->vista('/paginas/inicio');
				}
				else
				{
					$error_message=array('error_message'=>'El usuario y/o la contraseña son incorrectos');
					$this->vista('/Login/Login', $error_message);
				}

		}
		public function verify(){
			 
		}
		public function renderErrorMessage($message){
			$errors_message=array('error_message'=>$message);
			$this->render(__CLASS__, $params);
		}
		public  function exec(){
			$this->render(__CLASS__);
		}


	}

session_start();

 ?>
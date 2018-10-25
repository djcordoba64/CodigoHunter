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

		public function sining($request_params){
			if ($this->verify($request_params))
				return $this->renderErrorMessage('El pasword y la contrasena son obligatorios');
		}
		public function verify($request_params){
			return empty($request_params['usuario']) OR empty($request_params['contrasena']);
		}
		public function renderErrorMessage($message){
			$params=array('error_message'=>message);
			$this->render(__CLASS__, $params);
		}
		public  function exec(){
			$this->render(__CLASS__);
		}


	}

 ?>
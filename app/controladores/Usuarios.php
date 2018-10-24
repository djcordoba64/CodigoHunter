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
//--------------------------AGREGAR UN USUARIO------------------------------------------
		
		public function agregar(){

			//NOS VALIDA SI EL FORMULARIO HA SIDO ENVIADO
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){

				$datos=[				
					'primerNombre'		=>trim($_POST['primerNombre']),
					'segundoNombre'		=>trim($_POST['segundoNombre']),
					'primerApellido'	=>trim($_POST['primerApellido']),
					'segundoApellido'	=>trim($_POST['segundoApellido']),
					'documentoIdentidad'=>trim($_POST['documentoIdentidad']),
					'fechaNacimiento'	=>trim($_POST['fechaNacimiento']),
					'correo'			=>trim($_POST['correo']),
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),
					'usuario'			=>trim($_POST['usuario']),
					'rol'				=>trim($_POST['rol']),
					'contrasena'		=>trim($_POST['contrasena']),
					'confi_Contrasena'	=>trim($_POST['confi_Contrasena']),
					'estado'			=>trim($_POST['estado']),				
				];

				//SE EJECUTA EL MÉTODO agregarUsuario() del Modelo Persona.
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
					'socumentoIdentidad'=> '',
					'fechaNacimiento'	=> '',
					'correo'			=> '',
					'numeroContacto'	=> '',
					'direccion'			=> '',
					'usuario'			=> '',
					'rol'				=> '',
					'contrasena'		=> '',
					'confi_Contrasena'	=> '',
					'estado'			=> '',				
				];

				$this->vista('/Usuarios/agregar', $datos);
			}
		}


	}

 ?>
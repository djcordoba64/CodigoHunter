<?php
/**
 * 
 */
 class Perfiles extends Controlador
 {
 	
 	function __construct()
 	{
 		$this->personaModelo = $this->modelo('Persona');
 	} 

 	//Me carga los datos del Usuario logeado.
 	public function consultar() {

 		if (isset($_SESSION["idUsuario"])){
 			
 			$idPersona=$_SESSION["idUsuario"];
 			//consultamos los datos con esa variable.
 			$datos= $this->personaModelo->obtenerUsuarioId($idPersona);

 			$datos=[
 					'idPersona'			=>$idPersona,	
					'primerNombre'		=> $datos->primerNombre,
					'segundoNombre'		=> $datos->segundoNombre,
					'primerApellido'	=> $datos->primerApellido,
					'segundoApellido'	=> $datos->segundoApellido,
					'documentoIdentidad'=> $datos->documentoIdentidad,
					'fechaNacimiento'	=> $datos->fechaNacimiento,
					'correo'			=> $datos->correo,
					'numeroContacto'	=> $datos->numeroContacto,
					'direccion'			=> $datos->direccion,								
				]; 		
 		   //var_dump($datos);		
 		$this->vista('/Perfiles/consultar',$datos);

 		}		
 	}

 	public function actualizar($idPersona){

 		if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error'])){
				$datos=[
					'idPersona'			=>$idPersona,
					'correo'			=>trim($_POST['correo']),				
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),				
				];

			$this->personaModelo->editarUsuarioPerfil($datos);
 		$this->vista('/paginas/index');
 		}
 	}
 }

 ?>
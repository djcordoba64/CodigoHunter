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


			if($datos-> rol == 'administrador'){
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
					'foto'			=> $datos->foto,
					'contrasena' =>$datos->contrasena,
					'rol'=>$datos->rol,									
				]; 
				//var_dump($datos);		
 				$this->vista('/Perfiles/consultar_admin',$datos);			

			}else{

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
						'foto'			=> $datos->foto,									
					]; 		
	 		   		//var_dump($datos);		
	 				$this->vista('/Perfiles/consultar',$datos);			
 		}		
 	}
 }

 	public function actualizar($idPersona){


 		$tips='jpg';
 		$type=array('image/jpg' => 'jpg' );
 		$idUsuario= $idPersona;

 		$nombreFoto1=$_FILES['foto']['name'];
 		$ruta1=$_FILES['foto']['tmp_name'];
 		$nombre=$idUsuario.'.'.$tips;

 		if(is_uploaded_file($ruta1)){
 			$destino1=('C:\xampp\htdocs\Hunter\public\images\perfiles\usuario').$nombre;
 			
 			copy($ruta1,$destino1);

 		}


 		if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error'])){
				$datos=[
					'idPersona'			=>$idPersona,
					'correo'			=>trim($_POST['correo']),				
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),			
				];

			$this->personaModelo->editarPerfil($datos,$destino1);
 		$this->vista('/paginas/index');
 		}
 	}


 	public function actualizar_admin($idPersona){


 		$tips='jpg';
 		$type=array('image/jpg' => 'jpg' );
 		$idUsuario= $idPersona;

 		$nombreFoto1=$_FILES['foto']['name'];
 		$ruta1=$_FILES['foto']['tmp_name'];
 		$nombre=$idUsuario.'.'.$tips;

 		if(is_uploaded_file($ruta1)){
 			$destino1=('C:\xampp\htdocs\Hunter\public\images\perfiles\usuario').$nombre;
 			
 			copy($ruta1,$destino1);

 		}


 		if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error'])){
				$datos=[
					'idPersona'			=>$idPersona,
					'correo'			=>trim($_POST['correo']),				
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),
					'contrasena'		=>trim($_POST['contrasena']),			
				];

			$this->personaModelo->editarPerfilAdmin($datos,$destino1);
 		$this->vista('/paginas/index');
 		}
 	}




 }

 ?>
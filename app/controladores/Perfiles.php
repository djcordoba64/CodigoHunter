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


 		if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error']))
 		{
			$datos=[
					
					'idPersona'			=>$idPersona,
					'correo'			=>trim($_POST['correo']),				
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion']),			
			];

			if (!isset($destino1))
				$destino1="";

			$resultado=$this->personaModelo->editarPerfil($datos,$destino1);

			if($resultado==0){
				$datos=[				
						'mensaje_advertencia'		=> 'Perfil Aactualizado'
					];

			}
			if ($resultado!=0){
	 				$datos=[				
						'mensaje_advertencia'		=> 'Ocurrio un error al procesar la solicitud'
					];
	 			}

 			$this->vista('/paginas/index',$datos);
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

 		if ($_SERVER['REQUEST_METHOD'] == 'POST' and !isset($datos['mensaje_error']))
 		{
				$datos=[
					'idPersona'			=>$idPersona,
					'correo'			=>trim($_POST['correo']),				
					'numeroContacto'	=>trim($_POST['numeroContacto']),
					'direccion'			=>trim($_POST['direccion'])		
				];

			if (!isset($destino1))
				$destino1="";

			$resultado = $this->personaModelo->editarPerfil($datos,$destino1);

			if ($resultado==0){

				if ($_POST['contrasena']!='')
				{
					//validaciones antes de realizar la operacion:
					if($_POST["contrasena"]!=$_POST["confi_Contrasena"])
					{					
						// agrego mensaje al arreglo de datos para ser mostrado 
						$datos['mensaje_error'] ='Las contraseñas no coinciden';
						// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
						$this->vista('/perfiles/consultar_admin', $datos);
						return;
					}else{

						$resultado= $this->personaModelo->cambiarContrasena($idPersona, $_POST['contrasena']);
					}
 					
 				}

 				if ($resultado==0){
					$datos=[				
					'mensaje_advertencia'		=> 'Perfil Actualizado'
					];
				}
 			}

 			if ($resultado!=0){
 				$datos=[				
					'mensaje_advertencia'		=> 'Ocurrio un error al procesar la solicitud'
				];
 			}


 			$this->vista('/paginas/index', $datos);
 		}
 	}




 }

 ?>
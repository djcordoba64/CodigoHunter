<?php

/**
* 
*/
	class Recepciones extends Controlador
	{
		
		function __construct()
		{
			$this->recepcionModelo = $this->modelo('Recepcion');
			$this->personaModelo = $this->modelo('Persona');
			$this->fincaModelo = $this->modelo('Finca');
		}

		public function index(){
			//validacion de rol
			if($_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}
			
		}


		//muestra formulario vacio (GET - click en en link registrar recepcion)
		// solo campo identificacion y boton buscar
		public function registrar_nueva(){
			$datos=[				
					
					'documentoIdentidad'=> '',
				];

			$this->vista('/Recepciones/registrar_nueva', $datos);			
		}

		//busca el cliente con el numero de documento enviado (POST - submit boton consultar) 
		// si cliente existe muestra formulario  campos solo lectura del cliente y lista de fincas para que usuario seleccione finca, y muestra boton siguiente (seleccionar finca)
		public function registrar_consultar(){
		//consultamos el cliente si existe
			if($this->personaModelo->clienteExiste( $_POST['documentoIdentidad'] ) ){

				$cliente= $this->personaModelo->obtenerClienteDocumento( $_POST['documentoIdentidad']);

				$datos=[				
						'idPersona'			=> $cliente->idPersona,				
						'primerNombre'		=> $cliente->primerNombre,
						'segundoNombre'		=> $cliente->segundoNombre,
						'primerApellido'	=> $cliente->primerApellido,
						'segundoApellido'	=> $cliente->segundoApellido,
						'documentoIdentidad'=> $cliente->documentoIdentidad,
						'correo'			=> $cliente->correo,
						'numeroContacto'	=> $cliente->numeroContacto,
						'direccion'			=> $cliente->direccion,

					];

					$datos["idPersona"]=$cliente;

					//se obtienen array (php) de objetos para el select
					$fincas=$this->fincaModelo-> obtenerFincasCliente($cliente->idPersona);
					// se convierte en string que representa un array de javascript
					$fincas = json_encode($fincas);
					// se envia en variable para que la vista tenga disponible los datos para los script de javascript
					$datos["fincas"]=$fincas;
					
					//var_dump($datos);

				//var_dump($datos);

			 $this->vista('/Recepciones/registrar_consultar', $datos);
			}else
			{
				//NO se hizo submit al boton Consultar
				$mensaje_error=array('mensaje_error'=>'El cliente no esta registrado');
				$this->vista('/Recepciones/registrar_nueva', $mensaje_error);
			}
		}

		//me llega el cliente y la finca seleccionada (campos hidden) (POST - submit boton "agregra cafe") 
		// si cliente existe muestra formulario  campos solo lectura del cliente y lista de fincas para que usuario seleccione finca, mostrar boton siguiente (agregar cafe)
		public function agregar_finca_seleccionada($datos){
		//consultamos el cliente si existe
		$cliente=$this->personaModelo->obtenerClienteDocumento($documento);
				
				$datos=[
					'idPersona'=> $cliente->idPersona,				
				];
			$this->vista('/Recepciones/registrar_agregar_cafes', $datos);
			
		}
	}


?>
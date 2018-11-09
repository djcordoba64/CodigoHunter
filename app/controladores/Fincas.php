<?php
	
	/**
	* 
	*/
	class Fincas extends Controlador
	{
		
		function __construct()
		{
			//instanciamos la clase del modelo Finca.
			$this->fincaModelo = $this->modelo('Finca');			

			$this->UbicacionModelo = $this->modelo('Ubicacion');
		}
		

		//muestra formulario vacio de agregar finca, por primera vez (GET)
		public function agregar_formulario_inicial($datos){

			//validacion de rol
			if($_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}


			//consultas datos para los select del formulario
			$deptos = $this->UbicacionModelo -> obtenerDepartamentos();
			$deptos = json_encode($deptos);
			$municipios = $this->UbicacionModelo -> obtenerMunicipios();
			$municipios = json_encode($municipios);

			$datos["deptos"]=$deptos;
			$datos["municipios"]=$municipios;

			// primera vez, se envia array vacio como dato temporal de las fincas a crear/creadas temporalmente mientras se guardan
			$datos["fincasJson"]="";
			// tambien el atrray para crear la tabla de fincas
			$datos["fincasArr"]=array();


			$datos["idDetalleFinca"]=-1;

			var_dump($datos);
			//renderiza formulario vacio
			$this->vista('/Fincas/agregar', $datos);

		}

		// valida y guarda temporalmente una nueva finca o cambios a una finca previamente guardada (temporalmente) (POST)
		public function agregar_guardar_temporalmente(){


			//validacion de rol
			if($_SESSION["rol"]!="coordinador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			//consultas datos para los select del formulario
			$deptos = $this->UbicacionModelo -> obtenerDepartamentos();
			$deptos = json_encode($deptos);
			$municipios = $this->UbicacionModelo -> obtenerMunicipios();
			$municipios = json_encode($municipios);


			$datos["deptos"]=$deptos;
			$datos["municipios"]=$municipios;

			// recupero y guardo de nuevo datos del cliente (vienen de los hidden y van para los hidden de nuevo)
			$datos["primerNombre"]=$_POST['primerNombre'];
			$datos['segundoNombre']=$_POST['segundoNombre'];
			$datos['primerApellido']=$_POST['primerApellido'];
			$datos['segundoApellido']=$_POST['segundoApellido'];
			$datos['documentoIdentidad']=$_POST['documentoIdentidad'];
			$datos['fechaNacimiento']=$_POST['fechaNacimiento'];
			$datos['sexo']=$_POST['sexo'];
			$datos['correo']=$_POST['correo'];
			$datos['numeroContacto']=$_POST['numeroContacto'];
			$datos['direccion']=$_POST['direccion'];
			$datos['estado']=$_POST['estado'];
				

			// recupero los datos del formulario, la finca que se desea agregar/actualizar
			$datos["nombreFinca"]=$_POST['nombreFinca'];
			$datos["Temperatura"]=$_POST['Temperatura'];
			$datos["coordenadasGoogle"]=$_POST['coordenadasGoogle'];
			$datos["municipio"]=$_POST['municipio'];
			$datos["Estado"]=$_POST['Estado'];
			$datos["vereda"]=$_POST['vereda'];
			$datos["idDetalleFinca"]=$_POST['idDetalleFinca'];
				
			//recupero datos de las fincas que se han creado temporalmente (guardadas en el hidden y no se han guardado en BD)
			if(!empty($datos["fincasJson"])){
				$datos["fincasArr"]=json_decode($datos["fincasJson"]);
			}
			else
			{
				$datos["fincasArr"]=array();
			}

				if($datos["idDetalleFinca"] == -1 )
				{
					//es una nueva finca
					
						// creo array con datos
						$nuevaFinca = array('nombreFinca' => $_POST['nombreFinca'], 
											'Temperatura' => $_POST['Temperatura'], 
											'coordenadasGoogle' => $_POST['coordenadasGoogle'], 
											'municipio' => $_POST['municipio'], 
											'Estado' => $_POST['Estado'], 
											'vereda' => $_POST['vereda'], 
											'idDetalleFinca' => count($datos["fincasArr"])//agrega un id ficticio para poder editarlo despues, coincide con la pocision en el arreglo para que al editar se pueda usar este mismo id como indice en el arreglo
								);
					
						//agrego la finca al array de fincas para renderizar tabla de fincas creadas temporalmente en el formulario
						array_push($datos["fincasArr"], $nuevaFinca);

						//envio datos de fincas existentes para gurdarlas en el campo hidden para poder editar las temporales o finalmente guardarlas en BD 
						$datos["fincasJson"]=json_encode($datos["fincasArr"]);

						//limpio el formulario
						unset($datos["nombreFinca"]);
						unset($datos["Temperatura"]);
						unset($datos["coordenadasGoogle"]);
						unset($datos["municipio"]);
						unset($datos["Estado"]);
						unset($datos["vereda"]);
						unset($datos["idDetalleFinca"]);


			var_dump($datos);

						// carga formulario vacio solo fincas existentes
						$this->vista('Fincas/agregar', $datos);
						
				}
				else
				{
					//editar finca creada temporalmente
						
						$datosModificados = array('nombreFinca' => $_POST['nombreFinca'], 
											'Temperatura' => $_POST['Temperatura'], 
											'coordenadasGoogle' => $_POST['coordenadasGoogle'], 
											'municipio' => $_POST['municipio'], 
											'Estado' => $_POST['Estado'], 
											'vereda' => $_POST['vereda'], 
											'idDetalleFinca' => count($datos["idDetalleFinca"]));//usa el id temporal de la finca que se esta editando

						//reemplazo la finca en el indice especificado por los datos modificados
						$datos["fincasArr"][$datos["idDetalleFinca"]]=$datosModificados;

						//envio datos de fincas existentes para gurdarlas en el campo hidden para poder editar las temporales o finalmente guardarlas en BD 
						$datos["fincasJson"]=json_encode($datos["fincasArr"]);

						//limpio el formulario
						unset($datos["nombreFinca"]);
						unset($datos["Temperatura"]);
						unset($datos["coordenadasGoogle"]);
						unset($datos["municipio"]);
						unset($datos["Estado"]);
						unset($datos["vereda"]);
						unset($datos["idDetalleFinca"]);


			var_dump($datos);

						// cargar vista vacia (solo fincas existentes)
						$this->vista('Fincas/agregar', $datos);
						
				}

		}

		// usuario hizo clic en el link de editar de una finca en la grilla de fincas, cuando esta creando las fincas y todavia no se han guardado en DB (GET)
		public function agregar_editar_temporal(){

			//consultas datos para los select del formulario
			$deptos = $this->UbicacionModelo -> obtenerDepartamentos();
			$deptos = json_encode($deptos);
			$municipios = $this->UbicacionModelo -> obtenerMunicipios();
			$municipios = json_encode($municipios);

			$datos["deptos"]=$deptos;
			$datos["municipios"]=$municipios;

			
				//si entra aqui es porque estan editando (GET - url)

				//consulto datos de la finca a editar
					$datosFinca = $this -> fincaModelo -> obtenerFincaId($idFinca);
				//consulto datos para la tabla de fincas registradas para el cliente
					$datos["fincasArr"] = $this -> fincaModelo -> obtenerFincasCliente($datosFinca->idCliente);

					$datos["nombreFinca"]=$datosFinca->nombreFinca;
					$datos["Temperatura"]=$datosFinca->Temperatura;
					$datos["coordenadasGoogle"]=$datosFinca->coordenadasGoogle;
					$datos["municipio"]=$datosFinca->idmunicipio;
					$datos["idCliente"]=$datosFinca->idCliente;
					$datos["Estado"]=$datosFinca->Estado;
					$datos["vereda"]=$datosFinca->vereda;
					$datos["idDetalleFinca"]=$idFinca;


				//Nos carga la vista con los campos a editar 
				$this->vista('/Fincas/agregar', $datos);
			
		//----------------------------------------------------------------
	
		

		}

		public function gestionar($idFinca=-1){

			//consultas datos para los select del formulario
			$deptos = $this->UbicacionModelo -> obtenerDepartamentos();
			$deptos = json_encode($deptos);
			$municipios = $this->UbicacionModelo -> obtenerMunicipios();
			$municipios = json_encode($municipios);

			$datos["deptos"]=$deptos;
			$datos["municipios"]=$municipios;

			if ($_SERVER['REQUEST_METHOD'] == 'POST'){ // le dio submit y esta agregando o editando

				// si entra es porque estan agregando uno nuevo o estan guardando los datos de uno editado
						
				// recupero los datos del formulario
					$datos["nombreFinca"]=$_POST['nombreFinca'];
					$datos["Temperatura"]=$_POST['Temperatura'];
					$datos["coordenadasGoogle"]=$_POST['coordenadasGoogle'];
					$datos["municipio"]=$_POST['municipio'];
					$datos["idCliente"]=$_POST['idCliente'];
					$datos["Estado"]=$_POST['Estado'];
					$datos["vereda"]=$_POST['vereda'];
					$datos["idDetalleFinca"]=$_POST['idDetalleFinca'];
				

				if($datos["idDetalleFinca"] == -1 )
				{
					// agregar POST (el id enviado es -1)
					if($this->fincaModelo->agregarFinca($datos)){
						
						//consulto datos para la tabla de fincas registradas para el cliente
						$datos["fincasArr"] = $this -> fincaModelo -> obtenerFincasCliente($_POST['idCliente']);

						//limpio el formulario
						unset($datos["nombreFinca"]);
						unset($datos["Temperatura"]);
						unset($datos["coordenadasGoogle"]);
						unset($datos["municipio"]);
						unset($datos["Estado"]);
						unset($datos["vereda"]);
						unset($datos["idDetalleFinca"]);

						// carga formulario vacio solo fincas existentes
						$this->vista('Fincas/agregar', $datos);
						

					}
					else
					{
						die ('Algo salio mal');
					}
				}
				else
				{
					//editar POST (el id enviado es diferente de -1)
					if($this->fincaModelo->actualizarFinca($datos)){
						
						// lo actualizo, volviendo a mostrar el formulario vacio
						//consulto datos para la tabla de fincas registradas para el cliente
						$datos["fincasArr"] = $this -> fincaModelo -> obtenerFincasCliente($_POST['idCliente']);

						//limpio el formulario
						unset($datos["nombreFinca"]);
						unset($datos["Temperatura"]);
						unset($datos["coordenadasGoogle"]);
						unset($datos["municipio"]);
						unset($datos["Estado"]);
						unset($datos["vereda"]);
						unset($datos["idDetalleFinca"]);

						// cargar vista vacia (solo fincas existentes)
						$this->vista('Fincas/agregar', $datos);
						

					}
					else
					{
						die ('Algo salio mal');
					}
				}

			}
			else if($idFinca!=-1) // GET de la url con un id de finca para editar
			{
				//si entra aqui es porque estan editando (GET - url)

				//consulto datos de la finca a editar
					$datosFinca = $this -> fincaModelo -> obtenerFincaId($idFinca);
				//consulto datos para la tabla de fincas registradas para el cliente
					$datos["fincasArr"] = $this -> fincaModelo -> obtenerFincasCliente($datosFinca->idCliente);

					$datos["nombreFinca"]=$datosFinca->nombreFinca;
					$datos["Temperatura"]=$datosFinca->Temperatura;
					$datos["coordenadasGoogle"]=$datosFinca->coordenadasGoogle;
					$datos["municipio"]=$datosFinca->idmunicipio;
					$datos["idCliente"]=$datosFinca->idCliente;
					$datos["Estado"]=$datosFinca->Estado;
					$datos["vereda"]=$datosFinca->vereda;
					$datos["idDetalleFinca"]=$idFinca;


				//Nos carga la vista con los campos a editar 
				$this->vista('/Fincas/agregar', $datos);
			}
			else // no se
			{
				var_dump($idFinca);

				/*$datos=[				
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
					'estado'			=> '',	

				];
				//Nos redirecciona a la vista agregar--(formulario de registro de un cliente)
				$this->vista('/Cliente/crear', $datos);*/
		}
		//----------------------------------------------------------------
	
		

		}


	}	
?>
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
		//----Agregar finca--------------------------
		public function agregar($idFinca=-1){

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
						$datos["fincas"] = $this -> fincaModelo -> obtenerFincasCliente($_POST['idCliente']);

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
						$datos["fincas"] = $this -> fincaModelo -> obtenerFincasCliente($_POST['idCliente']);

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
					$datos["fincas"] = $this -> fincaModelo -> obtenerFincasCliente($datosFinca->idCliente);

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
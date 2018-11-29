<?php
/**
 * 
 */
 class Cafes extends Controlador
 {
 	
 	function __construct()
 	{
 		$this->cafeModelo = $this->modelo('Cafe');
 		$this->recepcionModelo = $this->modelo('Recepcion');
		$this->personaModelo = $this->modelo('Persona');
		$this->CafeModelo = $this->modelo('Cafe');
		$this->materiaPrimaModelo = $this->modelo('MateriaPrima');
		$this->tipoBeneficioModelo = $this->modelo('TipoBeneficio');
 	}
 	//me muestra el formulario vacio del café y envio el idCliente y idFinca
 	public function agregar_formulario_vacio(){
 		

			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

 		//var_dump($_POST);
 		//limpiando formulario
 		$datos['idCafe']='';
		$datos['codigoCafe']='';
		$datos['peso']='';
		$datos['especie']='';
		$datos['variedad']='';
		$datos['porcentajeHumedad']='';
		$datos['factorRendimiento']='';
		$datos['tipoTueste']='';
		$datos['molidadMedilaLibra']='';
		$datos['granoMediaLibra']='';
		$datos['granoLibra']='';
		$datos['estado']='';
		$datos['foto']='';
		$datos['cantidad']='';
		$datos['valorUnitario']='';
		$datos['idMateriPrima']='';
		$datos['idTipoBeneficio']='';

		// datos del formulario anterior que se guardaran en campos hidden
		$datos['idCliente']=$_POST["idCliente"];
		$datos['idDetalleFinca']=$_POST["fincas"];
		$datos['correo']=$_POST["correo"];
		$datos['direccion']=$_POST["direccion"];
		$datos['Temperatura']=$_POST["Temperatura"];

			//consultas datos para los select del formulario
			$materias = $this->materiaPrimaModelo -> obtenerMateriasPrimas();
			$materias = json_encode($materias);
			$beneficios = $this->tipoBeneficioModelo -> obtenerTiposBeneficio();
			$beneficios = json_encode($beneficios);


			$datos["materias"]=$materias;
			$datos["beneficios"]=$beneficios;

			// primera vez, se envia array vacio como dato temporal de las fincas a crear/creadas temporalmente mientras se guardan
			$datos["lotesJson"]="";
			// tambien el atrray para crear la tabla de fincas
			$datos["lotesArr"]=array();


			$datos["idLoteCafe"]=-1;

		//cargamos vista con datos 		
			$this->vista('/Cafes/agregar', $datos);
			
	}
	

	// valida y guarda temporalmente una nueva finca o cambios a una finca previamente guardada (temporalmente) (POST)
		public function agregar_guardar_temporalmente(){


			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			//consultas datos para los select del formulario
			$materias = $this->materiaPrimaModelo -> obtenerMateriasPrimas();
			$materias = json_encode($materias);
			$beneficios = $this->tipoBeneficioModelo -> obtenerTiposBeneficio();
			$beneficios = json_encode($beneficios);


			$datos["materias"]=$materias;
			$datos["beneficios"]=$beneficios;

			// recupero y guardo de nuevo datos del cliente (vienen de los hidden y van para los hidden de nuevo)
			$datos["idCliente"]=$_POST['idCliente'];
			$datos['idDetalleFinca']=$_POST['idDetalleFinca'];
			$datos['correo']=$_POST["correo"];
			$datos['direccion']=$_POST["direccion"];
			$datos['Temperatura']=$_POST["Temperatura"];

			// recupero los datos del formulario, la finca que se desea agregar/actualizar
			$datos["archivo"]=$_POST['archivo'];
			$datos["peso"]=$_POST['peso'];
			$datos["variedad"]=$_POST['variedad'];
			$datos["tipoTueste"]=$_POST['tipoTueste'];
			$datos["materia"]=$_POST['materia'];
			$datos["beneficio"]=$_POST['beneficio'];
			$datos["PorcentajeHumedad"]=$_POST['PorcentajeHumedad'];
			$datos["factorRendimiento"]=$_POST['factorRendimiento'];
			$datos["especie"]=$_POST['especie'];
			$datos["molidaLibra"]=$_POST['molidaLibra'];
			$datos["molidaMediaLibra"]=$_POST['molidaMediaLibra'];
			$datos["molidaCincoLibras"]=$_POST['molidaCincoLibras'];
			$datos["granoLibra"]=$_POST['granoLibra'];
			$datos["granoMediaLibra"]=$_POST['granoMediaLibra'];
			$datos["granoCincoLibras"]=$_POST['granoCincoLibras'];
			$datos["cantidad"]=$_POST['cantidad'];
			$datos["valorUnitario"]=$_POST['valorUnitario'];
			$datos["estado"]=$_POST['estado'];
			$datos["idLoteCafe"]=$_POST['idLoteCafe'];
				
			//recupero datos de las fincas que se han creado temporalmente (guardadas en el hidden y no se han guardado en BD)
			if(!empty($_POST["lotesJson"])){
				$datos["lotesArr"]=json_decode($_POST["lotesJson"]);
				//El siguiente codigo arregla un error que se genera al mandar los datos de las fincas por post, y estas se convierten en objetos, pero las necesitamos como array
				$temp_array=array();
				foreach ($datos['lotesArr'] as $lote) {
					$lote_temp = array('archivo'=>$lote->archivo,
										'peso'=>$lote->peso,
										'variedad'=>$lote->variedad,
										'tipoTueste'=>$lote->tipoTueste,
										'materia'=>$lote->materia,
										'beneficio'=>$lote->beneficio,
										'PorcentajeHumedad'=>$lote->PorcentajeHumedad,
										'factorRendimiento'=>$lote->factorRendimiento,
										'especie'=>$lote->especie,
										'molidaLibra'=>$lote->molidaLibra,
										'molidaMediaLibra'=>$lote->molidaMediaLibra,
										'molidaCincoLibras'=>$lote->molidaCincoLibras,
										'granoLibra'=>$lote->granoLibra,
										'granoMediaLibra'=>$lote->granoMediaLibra,
										'granoCincoLibras'=>$lote->granoCincoLibras,
										'cantidad'=>$lote->cantidad,
										'valorUnitario'=>$lote->valorUnitario,
										'estado'=>$lote->estado,
										'idLoteCafe' => $lote->idLoteCafe);
					array_push($temp_array, $lote_temp);

				}
				$datos["lotesArr"] = $temp_array;//fin del arreglo
			}
			else
			{
				$datos["lotesArr"]=array();
			}


				if($datos["idLoteCafe"] == -1 )
				{
					//es una nueva finca
					
						// creo array con datos
						$nuevoLote = array('archivo'=>$_POST['archivo'],
										'peso'=>$_POST['peso'],
										'variedad'=>$_POST['variedad'],
										'tipoTueste'=>$_POST['tipoTueste'],
										'materia'=>$_POST['materia'],
										'beneficio'=>$_POST['beneficio'],
										'PorcentajeHumedad'=>$_POST['PorcentajeHumedad'],
										'factorRendimiento'=>$_POST['factorRendimiento'],
										'especie'=>$_POST['especie'],
										'molidaLibra'=>$_POST['molidaLibra'],
										'molidaMediaLibra'=>$_POST['molidaMediaLibra'],
										'molidaCincoLibras'=>$_POST['molidaCincoLibras'],
										'granoLibra'=>$_POST['granoLibra'],
										'granoMediaLibra'=>$_POST['granoMediaLibra'],
										'granoCincoLibras'=>$_POST['granoCincoLibras'],
										'cantidad'=>$_POST['cantidad'],
										'valorUnitario'=>$_POST['valorUnitario'],
										'estado'=>$_POST['estado'], 
										'idLoteCafe' => count($datos["lotesArr"])//agrega un id ficticio para poder editarlo despues, coincide con la pocision en el arreglo para que al editar se pueda usar este mismo id como indice en el arreglo
								);
						/*//consultar nombres departamento y municipio
						$nombres = $this->UbicacionModelo->obtenerNombresMunicipioId($_POST['municipio']);

						//aregar a modelo para visualizarlos en tabla de fincas areggadas
						$nuevoLote["nombreMunicipio"]= $nombres->municipio;						
						$nuevoLote["nombreDepartamento"]= $nombres->departamento;*/
					
						//agrego la finca al array de fincas para renderizar tabla de fincas creadas temporalmente en el formulario
						array_push($datos["lotesArr"], $nuevoLote);



						//envio datos de fincas existentes para gurdarlas en el campo hidden para poder editar las temporales o finalmente guardarlas en BD 
						$datos["lotesJson"]=json_encode($datos["lotesArr"]);

						//limpio el formulario
						unset($datos["nombreFinca"]);
						unset($datos["archivo"]);
						unset($datos["peso"]);
						unset($datos["variedad"]);
						unset($datos["tipoTueste"]);
						unset($datos["materia"]);
						unset($datos["beneficio"]);
						unset($datos["PorcentajeHumedad"]);
						unset($datos["factorRendimiento"]);
						unset($datos["especie"]);
						unset($datos["molidaLibra"]);
						unset($datos["molidaMediaLibra"]);
						unset($datos["molidaCincoLibras"]);
						unset($datos["granoLibra"]);
						unset($datos["granoMediaLibra"]);
						unset($datos["granoCincoLibras"]);
						unset($datos["cantidad"]);
						unset($datos["valorUnitario"]);
						unset($datos["estado"]);
						unset($datos["idLoteCafe"]);



						//var_dump($datos);
						// carga formulario vacio solo fincas existentes
						$this->vista('Cafes/agregar', $datos);
						
				}
				else
				{
					//editar finca creada temporalmente
						
						$datosModificados = array('archivo'=>$_POST['archivo'],
										'peso'=>$_POST['peso'],
										'variedad'=>$_POST['variedad'],
										'tipoTueste'=>$_POST['tipoTueste'],
										'materia'=>$_POST['materia'],
										'beneficio'=>$_POST['beneficio'],
										'PorcentajeHumedad'=>$_POST['PorcentajeHumedad'],
										'factorRendimiento'=>$_POST['factorRendimiento'],
										'especie'=>$_POST['especie'],
										'molidaLibra'=>$_POST['molidaLibra'],
										'molidaMediaLibra'=>$_POST['molidaMediaLibra'],
										'molidaCincoLibras'=>$_POST['molidaCincoLibras'],
										'granoLibra'=>$_POST['granoLibra'],
										'granoMediaLibra'=>$_POST['granoMediaLibra'],
										'granoCincoLibras'=>$_POST['granoCincoLibras'],
										'cantidad'=>$_POST['cantidad'],
										'valorUnitario'=>$_POST['valorUnitario'],
										'estado'=>$_POST['estado'], 
										'idLoteCafe' => $_POST["idLoteCafe"]);//usa el id temporal de la finca que se esta editando

						/*//consultar nombres departamento y municipio
						$nombres = $this->UbicacionModelo->obtenerNombresMunicipioId($_POST['municipio']);

						//aregar a modelo para visualizarlos en tabla de fincas areggadas
						$datosModificados["nombreMunicipio"]= $nombres->municipio;						
						$datosModificados["nombreDepartamento"]= $nombres->departamento;*/

						//reemplazo la finca en el indice especificado por los datos modificados
						$datos["lotesArr"][$datos["idLoteCafe"]]=$datosModificados;



						//envio datos de fincas existentes para gurdarlas en el campo hidden para poder editar las temporales o finalmente guardarlas en BD 
						$datos["lotesJson"]=json_encode($datos["lotesArr"]);

						//limpio el formulario
						unset($datos["nombreFinca"]);
						unset($datos["archivo"]);
						unset($datos["peso"]);
						unset($datos["variedad"]);
						unset($datos["tipoTueste"]);
						unset($datos["materia"]);
						unset($datos["beneficio"]);
						unset($datos["PorcentajeHumedad"]);
						unset($datos["factorRendimiento"]);
						unset($datos["especie"]);
						unset($datos["molidaLibra"]);
						unset($datos["molidaMediaLibra"]);
						unset($datos["molidaCincoLibras"]);
						unset($datos["granoLibra"]);
						unset($datos["granoMediaLibra"]);
						unset($datos["granoCincoLibras"]);
						unset($datos["cantidad"]);
						unset($datos["valorUnitario"]);
						unset($datos["estado"]);
						unset($datos["idLoteCafe"]);


						//var_dump($datos);
						// cargar vista vacia (solo fincas existentes)
						$this->vista('Cafes/agregar', $datos);
						
				}

		}

		// usuario hizo clic en el link de editar de una finca en la grilla de fincas, cuando esta creando las fincas y todavia no se han guardado en DB (GET)
		public function agregar_editar_temporal($idLoteEditar){


			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

				//consultas datos para los select del formulario
				$materias = $this->materiaPrimaModelo -> obtenerMateriasPrimas();
				$materias = json_encode($materias);
				$beneficios = $this->tipoBeneficioModelo -> obtenerTiposBeneficio();
				$beneficios = json_encode($beneficios);
	
	
				$datos["materias"]=$materias;
				$datos["beneficios"]=$beneficios;
	
				// recupero y guardo de nuevo datos del cliente (vienen de los hidden y van para los hidden de nuevo)
				$datos["idCliente"]=$_POST['idCliente'];
				$datos['idDetalleFinca']=$_POST['idDetalleFinca'];
				$datos['correo']=$_POST["correo"];
				$datos['direccion']=$_POST["direccion"];
				$datos['Temperatura']=$_POST["Temperatura"];

			
			//recupero datos de las fincas que se han creado temporalmente (guardadas en el hidden y no se han guardado en BD)
			$datos["lotesArr"]=json_decode($_POST["lotesJson"]);
			

			//El siguiente codigo arregla un error que se genera al mandar los datos de las fincas por post, y estas se convierten en objetos, pero las necesitamos como array
			$temp_array=array();
			foreach ($datos['lotesArr'] as $lote) {
				$lote_temp = array('archivo'=>$lote->archivo,
							'peso'=>$lote->peso,
							'variedad'=>$lote->variedad,
							'tipoTueste'=>$lote->tipoTueste,
							'materia'=>$lote->materia,
							'beneficio'=>$lote->beneficio,
							'PorcentajeHumedad'=>$lote->PorcentajeHumedad,
							'factorRendimiento'=>$lote->factorRendimiento,
							'especie'=>$lote->especie,
							'molidaLibra'=>$lote->molidaLibra,
							'molidaMediaLibra'=>$lote->molidaMediaLibra,
							'molidaCincoLibras'=>$lote->molidaCincoLibras,
							'granoLibra'=>$lote->granoLibra,
							'granoMediaLibra'=>$lote->granoMediaLibra,
							'granoCincoLibras'=>$lote->granoCincoLibras,
							'cantidad'=>$lote->cantidad,
							'valorUnitario'=>$lote->valorUnitario,
							'estado'=>$lote->estado,
							'idLoteCafe' => $lote->idLoteCafe);
			array_push($temp_array, $lote_temp);

			}
			$datos["lotesArr"] = $temp_array;//fin del arreglo

			
				//si entra aqui es porque estan editando (GET - url)

				//consulto datos de la finca a editar desde el array guardado, mediante el id falso (el asignado temporalmente) de la finca 
					$datosLote = $datos["lotesArr"][$idLoteEditar];

				//asigno
				$datos["archivo"]=$datosLote['archivo'];
				$datos["peso"]=$datosLote['peso'];
				$datos["variedad"]=$datosLote['variedad'];
				$datos["tipoTueste"]=$datosLote['tipoTueste'];
				$datos["materia"]=$datosLote['materia'];
				$datos["beneficio"]=$datosLote['beneficio'];
				$datos["PorcentajeHumedad"]=$datosLote['PorcentajeHumedad'];
				$datos["factorRendimiento"]=$datosLote['factorRendimiento'];
				$datos["especie"]=$datosLote['especie'];
				$datos["molidaLibra"]=$datosLote['molidaLibra'];
				$datos["molidaMediaLibra"]=$datosLote['molidaMediaLibra'];
				$datos["molidaCincoLibras"]=$datosLote['molidaCincoLibras'];
				$datos["granoLibra"]=$datosLote['granoLibra'];
				$datos["granoMediaLibra"]=$datosLote['granoMediaLibra'];
				$datos["granoCincoLibras"]=$datosLote['granoCincoLibras'];
				$datos["cantidad"]=$datosLote['cantidad'];
				$datos["valorUnitario"]=$datosLote['valorUnitario'];
				$datos["estado"]=$datosLote['estado'];
				$datos["idLoteCafe"]=$idLoteEditar;

				//envio datos de fincas existentes para gurdarlas en el campo hidden para poder editar las temporales o finalmente guardarlas en BD despues
						$datos["lotesJson"]=json_encode($datos["lotesArr"]);

				// carga la vista con los campos a editar 
				$this->vista('/Cafes/agregar', $datos);
		}	
		//----------------------------------------------------------------		
		public function cambiar_subir_foto($idcafe){
			//validacion de rol
			if($_SESSION["rol"]!="operario"	and $_SESSION["rol"]!="tostador")
			{
				// agrego mensaje a arreglo de datos para ser mostrado 
				$datos['mensaje_advertencia'] ='Usted no tiene permiso para realizar esta acción';
				// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
				$this->vista('/paginas/index',$datos);
				return;
			}

			$datoscafes= $this->CafeModelo ->consultar_x_idCafe($idcafe);
				$datos=[
						'codigoCafe'	=> $datoscafes->codigoCafe,
						'idcafe'	=> $datoscafes->idcafe,
															
					];


			$this->vista('/cafes/foto', $datos);
		}


		public function guardar_foto($idcafe){


 		$tips='jpg';
 		$type=array('image/jpg' => 'jpg' );
 		//$idcafe= $idcafe;

 		$nombreFoto1=$_FILES['imagen']['name'];
 		$ruta1=$_FILES['imagen']['tmp_name'];
 		$nombre=$idcafe.'.'.$tips;



 		if(is_uploaded_file($ruta1)){
 			$destino1=('C:\xampp\htdocs\Hunter\public\images\cafes\lote').$nombre;
 			
 			copy($ruta1,$destino1);
		}


		$resultado = $this->CafeModelo ->subir_guardarFoto($idcafe,$destino1);

		if ($resultado!==0){
			// agrego mensaje al arreglo de datos para ser mostrado 
			$datos['mensaje_error'] ='Nos se pudo realizar la acción';
			// vuelvo a llamar la misma vista con los datos enviados previamente para que usuario corrija
			$this->vista('/Recepciones/mostrar_opcion_foto', $datos);
		}else{
			$datos=['mensaje_advertencia'=> 'Perfil Aactualizado'];
		}			

	}



 } 

 ?>
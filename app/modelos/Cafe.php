<?php
/**
 * 
 */
	 class Cafe 
	 {
	 	
	 	function __construct()
	 	{
	 		$this->db = new Base;
	 	}
	 
	 	 //--CREAR UN NUEVO CAFÉ----
	 	 public function crear(){
	 	 	$this->db->query("INSERT INTO cafes (idcafe,codigoCafe,peso,especie,variedad,porcentajeHumedad,factorRendimiento,tipoTueste,molidaMediaLibra,molidaLibra,granoMediaLibra,granoLibra,estado,foto,cantidad,valorUnitario,idmateriaPrima,idtipoBeneficio,created_at,created_by) VALUES (:idcafe,:codigoCafe,:peso,:especie,:variedad,:porcentajeHumedad,:factorRendimiento,:tipoTueste,:molidaMediaLibra,:molidaLibra,:granoMediaLibra,:granoLibra,:estado,:foto,:cantidad,:valorUnitario,idmateriaPrima,:idtipoBeneficio,:NOW(),:created_by)");


	 	 	//vinculamos los valores
	 	 	//vinculamos los valores
			 $this->db->bind(':codigoCafe' , $cafe['codigoCafe']);
			 $this->db->bind(':peso',$cafes['peso']);
			 $this->db->bind(':especie' , $cafe['especie']);
			 $this->db->bind(':variedad',$cafes['variedad']);
			 $this->db->bind(':porcentajeHumedad' , $cafe['porcentajeHumedad']);
			 $this->db->bind(':factorRendimiento',$cafes['factorRendimiento']);
			 $this->db->bind(':tipoTueste' , $cafe['tipoTueste']);
			 $this->db->bind(':molidaMediaLibra',$cafes['molidaMediaLibra']);
			
	 	 }

	 	 //Validar si esta registrado el codigo del café
	 	 public function cafeExiste($codigoCafe){
            $this->db->query( "SELECT count(1) as existe FROM cafes where codigoCafe=:codigoCafe " );
            $this->db->bind(':codigoCafe',$codigoCafe);
            $fila=$this->db->registro();
            return $fila->existe==1;
        }


	 	 //obtener los datos del café
	 	 public function optenerDatoscafe($codigoCafe){
	 	 	$this->db->query("SELECT * FROM cafes WHERE codigoCafe=:codigoCafe ");
        	$this->db->bind(':codigoCafe', $codigoCafe);
			$idcafe=$this->db->registro();
     		return $idcafe;
		  } 
		  
		  public function agregarLotes($datosLote, $idRecepcion, $idCliente){

			$this->db->empezarTransaccion();


			foreach ($datosLote as $lote) {
						//preparamos la consulata
					$datos["archivo"]=$lote->archivo;
					$datos["peso"]=$lote->peso;
					$datos["variedad"]=$lote->variedad;
					$datos["tipoTueste"]=$lote->tipoTueste;
					$datos["materia"]=$lote->materia;
					$datos["beneficio"]=$lote->beneficio;
					$datos["PorcentajeHumedad"]=$lote->PorcentajeHumedad;
					$datos["factorRendimiento"]=$lote->factorRendimiento;
					$datos["especie"]=$lote->especie;
					$datos["molidaLibra"]=$lote->molidaLibra;
					$datos["molidaMediaLibra"]=$lote->molidaMediaLibra;
					$datos["molidaCincoLibras"]=$lote->molidaCincoLibras;
					$datos["granoLibra"]=$lote->granoLibra;
					$datos["granoMediaLibra"]=$lote->granoMediaLibra;
					$datos["granoCincoLibras"]=$lote->granoCincoLibras;
					$datos["cantidad"]=$lote->cantidad;
					$datos["valorUnitario"]=$lote->valorUnitario;
					$datos["estado"]=$lote->estado;
					$datos["idRecepcion"]=$idRecepcion;
					// agregar POST (el id enviado es -1)
					if(!$this->agregarLote($datos,$idCliente)){
						//hubo un error
						$this->db->descartarTransaccion();
						return false;
					}
       		}
       		$this->db->guardarTransaccion();
       		return true;
		}

		public function agregarLote($datosLote,$idCliente){
			//preparamos la consulata
			$this->db->query('INSERT INTO cafes (codigoCafe,peso,especie,variedad,idtipoBeneficio,idmateriaPrima,porcentajeHumedad,factorRendimiento,
			tipoTueste,molidaLibra,molidaMediaLibra,molidaCincoLibras,granoLibra,granoMediaLibra,granoCincoLibras,cantidad,
			valorUnitario,estado,idRecepcion,created_at,created_by) 
			 VALUES (:codigoCafe, :peso, :especie, :variedad, :idtipoBeneficio, :idmateriaPrima, :porcentajeHumedad, :factorRendimiento, 
			 :tipoTueste, :molidaLibra, :molidaMediaLibra, :molidaCincoLibras, :granoLibra, :granoMediaLibra, :granoCincoLibras, :cantidad, 
			 :valorUnitario, :estado, :idRecepcion, NOW(), :created_by)
			 ');
			 
			 //vinculamos los valores
			 $this->db->bind(':codigoCafe' , 0);
			 $this->db->bind(':peso',$datosLote['peso']);
			 $this->db->bind(':especie', $datosLote['especie']);
			 $this->db->bind(':variedad', $datosLote['variedad']);	
			 $this->db->bind(':idtipoBeneficio', $datosLote['beneficio']);	
			 $this->db->bind(':idmateriaPrima', $datosLote['materia']);	
			 $this->db->bind(':porcentajeHumedad', $datosLote['PorcentajeHumedad']);		
			 $this->db->bind(':factorRendimiento', $datosLote['factorRendimiento']);
			 $this->db->bind(':tipoTueste', $datosLote['tipoTueste']);
			 $this->db->bind(':molidaLibra', $datosLote['molidaLibra']);
			 $this->db->bind(':molidaMediaLibra', $datosLote['molidaMediaLibra']);	
			 $this->db->bind(':molidaCincoLibras', $datosLote['molidaCincoLibras']);		
			 $this->db->bind(':granoLibra', $datosLote['granoLibra']);
			 $this->db->bind(':granoMediaLibra', $datosLote['granoMediaLibra']);
			 $this->db->bind(':granoCincoLibras', $datosLote['granoCincoLibras']);
			 $this->db->bind(':cantidad', $datosLote['cantidad']);	
			 $this->db->bind(':valorUnitario', $datosLote['valorUnitario']);		
			 $this->db->bind(':estado', $datosLote['estado']);
			 $this->db->bind(':idRecepcion', $datosLote['idRecepcion']);
			 $this->db->bind(':created_by', $_SESSION['idUsuario']);
			


			 //Ejecutamos la consulta
			if ($this->db->execute()){   
				
				$idLote = $this->db->obtenerUltimoId();
				
				if($this->AsignarCodigo($idLote,$datosLote['beneficio'],$idCliente))
				{
					return true;
				}
				else {
					return false;
				}
           	}else{
            	return false;
           }
		}

		public function AsignarCodigo($idLote,$idBeneficio,$idCliente){
			//preparamos la consulata
			$this->db->query('SELECT idtipoBeneficio, nombre, estado FROM tipobeneficio where estado = "Activo" and idtipoBeneficio=:idtipoBeneficio');
			$this->db->bind(':idtipoBeneficio', $idBeneficio);
			$beneficio=$this->db->registro();

			$this->db->query( "SELECT * FROM personas where idPersona=:idPersona and tipoPersona='cliente'");
            $this->db->bind(':idPersona',$idCliente);
            $cliente=$this->db->registro();

			$codigo = substr($beneficio->nombre,0,1).$idLote.substr($cliente->primerNombre,0,1).substr($cliente->primerApellido,0,1);

			$this->db->query("update cafes set codigoCafe = :codigo where idcafe = :idcafe ");

			 //vinculamos los valores
			 $this->db->bind(':codigo' , $codigo);
			 $this->db->bind(':idcafe', $idLote);
			
			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return true;
           	}else{
            	return false;
           }
		}



		public function consultar_x_idCafe($idcafe){
			$this->db->query('SELECT codigoCafe, idcafe FROM cafes where idcafe=:idcafe ');
			$this->db->bind(':idcafe', $idcafe);
			$fila=$this->db->registro();
            return $fila;
		}

		//mostrar detalle index- detalle
		public function obtenerCafesRecepcion($idRecepcion){
			$this->db->query("SELECT * from cafes where idRecepcion=:idRecepcion");	
			 $this->db->bind(':idRecepcion', $idRecepcion);	
            $cafes=$this->db->registros();
        return $cafes;


		}

        public function subir_guardarFoto($idcafe,$destino1){
          $this->db->query('UPDATE cafes SET foto=:foto, updated_at= NOW(), updated_by = :updated_by where idcafe= :idcafe');

           //vinculamos los valores
            $this->db->bind(':idcafe',$idcafe);
            $this->db->bind(':foto'  ,$destino1);           
            $this->db->bind(':updated_by' ,$_SESSION['idUsuario']);

            if ($this->db->execute()){           
                return 0;
            }
            else{
                return -1;
            }
        }

	}
?>
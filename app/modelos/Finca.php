<?php
	/**
	* 
	*/
	class Finca {		
		function __construct()
		{
			$this->db = new Base;
		}

		//---AGREGAR UNA NUEVA FINCA------------------------------------------
		public function agregarFinca($datosFinca){
			//preparamos la consulata
			$this->db->query('INSERT INTO detallefinca (nombreFinca,Temperatura,coordenadasGoogle,idmunicipio,idCliente,Estado,vereda,created_at,created_by) 
			 VALUES (:nombreFinca,:Temperatura,:coordenadasGoogle,:idmunicipio,:idCliente,:Estado,:vereda,NOW(),:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':nombreFinca' , $datosFinca['nombreFinca']);
			 $this->db->bind(':Temperatura',$datosFinca['Temperatura']);
			 $this->db->bind(':coordenadasGoogle', $datosFinca['coordenadasGoogle']);
			 $this->db->bind(':idmunicipio', $datosFinca['municipio']);	
			 $this->db->bind(':idCliente', $datosFinca['idCliente']);		
			 $this->db->bind(':Estado', $datosFinca['Estado']);
			 $this->db->bind(':vereda', $datosFinca['vereda']);
			 $this->db->bind(':created_by', $_SESSION['idUsuario']);
			


			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return true;
           	}else{
            	return false;
           }
		}

		public function agregarFincas($datosFinca, $idCliente){

			$this->db->empezarTransaccion();


			foreach ($datosFinca as $finca) {
						//preparamos la consulata
					$datos["nombreFinca"]=$finca->nombreFinca;
					$datos["Temperatura"]=$finca->Temperatura;
					$datos["coordenadasGoogle"]=$finca->coordenadasGoogle;
					$datos["municipio"]=$finca->municipio;
					$datos["idCliente"]=$idCliente;
					$datos["Estado"]=$finca->Estado;
					$datos["vereda"]=$finca->vereda;

					// agregar POST (el id enviado es -1)
					if(!$this->agregarFinca($datos)){
						//hubo un error
						$this->db->descartarTransaccion();
						return false;
					}
       		}
       		$this->db->guardarTransaccion();
       		return true;
		}



		public function actualizarFinca($datosFinca){
			//preparamos la consulata
			$this->db->query("update detallefinca set nombreFinca = :nombreFinca, Temperatura = :Temperatura, coordenadasGoogle = :coordenadasGoogle, idmunicipio = :idmunicipio, idCliente = :idCliente, Estado = :Estado, vereda = :vereda, updated_at = NOW(), updated_by = :updated_by where idDetallefinca = :idDetalleFinca
			 ");

			 //vinculamos los valores
			 $this->db->bind(':nombreFinca' , $datosFinca['nombreFinca']);
			 $this->db->bind(':Temperatura',$datosFinca['Temperatura']);
			 $this->db->bind(':coordenadasGoogle', $datosFinca['coordenadasGoogle']);
			 $this->db->bind(':idmunicipio', $datosFinca['municipio']);	
			 $this->db->bind(':idCliente', $datosFinca['idCliente']);		
			 $this->db->bind(':Estado', $datosFinca['Estado']);
			 $this->db->bind(':vereda', $datosFinca['vereda']);
			 $this->db->bind(':updated_by', $_SESSION['idUsuario']);
			 $this->db->bind(':idDetalleFinca', $datosFinca['idDetalleFinca']);
			
			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return true;
           	}else{
            	return false;
           }
		}
		//lista de las fincas del cliente
		public function obtenerFincasCliente($idCliente){
         $this->db->query("SELECT f.*, m.municipio, d.departamento FROM detallefinca as f  join municipios as m on f.idmunicipio = m.id_municipio join departamentos as d on d.id_departamento = m.departamento_id WHERE f.idCliente=:idCliente");	
			 $this->db->bind(':idCliente', $idCliente);	
            $fincas=$this->db->registros();
        return $fincas;
       }

       public function obtenerFincaId($idFinca){
         $this->db->query("SELECT * FROM detallefinca WHERE idDetalleFinca=:idDetalleFinca");	
			 $this->db->bind(':idDetalleFinca', $idFinca);	
            $fincas=$this->db->registro();
        return $fincas;
       }
		//------------------------------------------------------------------------------------------------
		public function obtener_datos_x_id($idFinca){
         $this->db->query("SELECT idDetalleFinca,nombreFinca,Temperatura,coordenadasGoogle,idmunicipio,dt.Estado,vereda,m.municipio,d.departamento FROM detallefinca as dt left join municipios as m on m.id_municipio=dt.idmunicipio left JOIN departamentos as d on d.id_departamento =m.departamento_id WHERE idDetalleFinca=:idDetalleFinca");	
			 $this->db->bind(':idDetalleFinca', $idFinca);	
            $fincas=$this->db->registro();
        return $fincas;
       }

       public function editar_finca($datos){
			//preparamos la consulata
			$this->db->query("UPDATE detallefinca SET  Temperatura = :Temperatura, coordenadasGoogle = :coordenadasGoogle,  Estado = :Estado,  updated_at = NOW(), updated_by = :updated_by where idDetallefinca = :idDetalleFinca
			 ");

			 //vinculamos los valores
			 $this->db->bind(':Temperatura',$datos['Temperatura']);
			 $this->db->bind(':coordenadasGoogle', $datos['coordenadasGoogle']);		
			 $this->db->bind(':Estado', $datos['Estado']);
			 $this->db->bind(':updated_by', $_SESSION['idUsuario']);
			 $this->db->bind(':idDetalleFinca', $datos['idDetalleFinca']);
			
			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return 0;
           	}else{
            	return -1;
           }
		}

		public function crear($datos){
		//preparamos la consulata
			$this->db->query('INSERT INTO detallefinca (nombreFinca,Temperatura,coordenadasGoogle,idmunicipio,idCliente,Estado,vereda,created_at,created_by) 
			 VALUES (:nombreFinca,:Temperatura,:coordenadasGoogle,:idmunicipio,:idCliente,:Estado,:vereda,NOW(),:created_by)
			 ');

			 //vinculamos los valores
			$this->db->bind(':nombreFinca' , $datos['nombreFinca']);
			 $this->db->bind(':Temperatura',$datos['Temperatura']);
			 $this->db->bind(':coordenadasGoogle', $datos['coordenadasGoogle']);
			 $this->db->bind(':idmunicipio', $datos['municipio']);	
			 $this->db->bind(':idCliente', $datos['idPersona']);		
			 $this->db->bind(':Estado', $datos['Estado']);
			 $this->db->bind(':vereda', $datos['vereda']);
			 $this->db->bind(':created_by', $_SESSION['idUsuario']);
			


			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return true;
           	}else{
            	return false;
           }
		}


		

      
	}

?>
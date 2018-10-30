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
		//modificar el campo coordenadasGoocle por coordenadasGoogle.
		public function agregar($datosFinca){
			//preparamos la consulata
			$this->db->query('INSERT INTO detallefinca (nombreFinca,Temperatura,coordenadasGoogle,idMunicipio,idCliente,Estado,vereda,created_at,created_by) 
			 VALUES (:nombreFinca,:Temperatura,:coordenadasGoogle,:idMunicipio,:idCliente,:Estado,:Vereda,NOW(),:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':nombreFinca' , $datosFinca['nombreFinca']);
			 $this->db->bind(':Temperatura',$datosFinca['nombreFinca']);
			 $this->db->bind(':coordenadasGoogle', $datosFinca['coordenadasGoogle']);
			 $this->db->bind(':idMunicipio', $datosFinca['idMunicipio']);	
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
		//------------------------------------------------------------------------------------------------
		
	}

?>
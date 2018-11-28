<?php

/**
 * 
 */
class PruebasLaboratorio
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function crear($datos,$idcafe){
		//preparamos la consulata
		$this->db->query('INSERT INTO datospruebasdelaboratorio (fechaHora,idCafe,humedad,densidad,actividadAcuosa,diseñoCurva,observacion,created_at,created_by) 
		VALUES (NOW(),:idcafe,:humedad,:densidad,:actividadAcuosa,:diseñoCurva,:observacion,NOW(),:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':humedad', $datos['humedad']);
			 $this->db->bind(':densidad', $datos['densidad']);
			 $this->db->bind(':actividadAcuosa', $datos['actividadAcuosa']);
			  $this->db->bind(':diseñoCurva', $datos['diseñoCurva']);	
			 $this->db->bind(':observacion', $datos['observacion']);			 		
			 $this->db->bind(':created_by', $_SESSION['idUsuario']);

			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return 0;
           	}else{
            	return -1;
           }

	}


}

?>
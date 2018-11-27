<?php

/**
 * 
 */
class Trilla
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function obtenerDatos_x_id($idcafe){
    	$this->db->query("SELECT d.idDatoTrilla, d.idcafe, c.codigoCafe,d.fechaHora,d.mermaTrilla,d.mallas,d.observacion,d.pesoCafeVerde FROM datostrilla d inner join cafes c on c.idcafe=d.idcafe WHERE d.idcafe=:idcafe");
        $this->db->bind(':idcafe',$idcafe);
        $fila=$this->db->registro();
        return $fila;
	}

	public function actualizarDatos($datos){
		$this->db->query('UPDATE datostrilla SET 
			mermaTrilla=:mermaTrilla,
			mallas=:mallas,
			observacion=:observacion, 
			pesoCafeVerde=:pesoCafeVerde,
			updated_at= NOW(),
			updated_by = :updated_by 
            where idcafe= :idcafe');

		 //vinculamos los valores
		 	$this->db->bind(':idDatoTrilla',  $datos['idDatoTrilla']);
            $this->db->bind(':mermaTrilla',  $datos['mermaTrilla']);
            $this->db->bind(':mallas',  $datos['mallas']);
            $this->db->bind(':observacion',  $datos['observacion']);
            $this->db->bind(':pesoCafeVerde',  $datos['pesoCafeVerde']);
            $this->db->bind(':updated_by',  $_SESSION['idUsuario']);

            if ($this->db->execute()){           
                return 0; //se hizo el update
            }
            else{
                return -1;
            }

	}

	public function crear($datos,$idcafe){
		//preparamos la consulata
		$this->db->query('INSERT INTO datostrilla (fechaHora,idCafe,mermaTrilla,mallas,observacion,created_at,created_by) 
			 VALUES (NOW(),:idcafe,:mermaTrilla,:mallas,:observacion,NOW(),:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':mermaTrilla', $datos['mermaTrilla']);
			 $this->db->bind(':mallas', $datos['mallas']);	
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
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
		$this->db->query( "SELECT * FROM datospruebasdelaboratorio where idcafe=:idcafe and iddatosPruebasLaboratorio =(select max(iddatosPruebasLaboratorio) from datospruebasdelaboratorio  where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       var_dump($fila);
       if($fila!==true){
       		//preparamos la consulata
		$this->db->query('INSERT INTO datospruebasdelaboratorio (fechaHora,idCafe,humedad,densidad,actividadAcuosa,disenoCurva,observacion,created_by) 
		VALUES (NOW(),:idcafe,:humedad,:densidad,:actividadAcuosa,:disenoCurva,:observacion,:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':humedad', $datos['humedad']);
			 $this->db->bind(':densidad', $datos['densidad']);
			 $this->db->bind(':actividadAcuosa', $datos['actividadAcuosa']);
			 $this->db->bind(':disenoCurva', $datos['disenoCurva']);	
			 $this->db->bind(':observacion', $datos['observacion']);			 		
			 $this->db->bind(':created_by', $_SESSION['idUsuario']);

			 //Ejecutamos la consulta
			if ($this->db->execute()){           
            	return 0;
           	}else{
            	return -1;
           }

       }else{

       	  return 1;//EL id ya existe.
       }		
	}

	public function obtenerDatos_x_id($idcafe){
		$this->db->query("SELECT c.codigoCafe, d.iddatosPruebasLaboratorio,d.fechaHora,d.idcafe,d.humedad,d.densidad,d.actividadAcuosa,d.disenoCurva,d.observacion from datospruebasdelaboratorio as d INNER JOIN cafes as c on c.idcafe=d.idcafe WHERE d.idcafe=:idcafe");
        $this->db->bind(':idcafe',$idcafe);
        $fila=$this->db->registro();
        return $fila;
	}


	public function actualizarDatos($datos){
		$this->db->query('UPDATE datospruebasdelaboratorio SET 
			humedad=:humedad,
			densidad=:densidad,
			actividadAcuosa=:actividadAcuosa, 
			disenoCurva=:disenoCurva,
			observacion=:observacion,
			updated_at= NOW(),
			updated_by = :updated_by 
            where iddatosPruebasLaboratorio=:iddatosPruebasLaboratorio');

            $this->db->bind(':humedad',  $datos['humedad']);
            $this->db->bind(':densidad',  $datos['densidad']);
            $this->db->bind(':actividadAcuosa',  $datos['actividadAcuosa']);
            $this->db->bind(':disenoCurva',  $datos['disenoCurva']);
            $this->db->bind(':observacion',  $datos['observacion']);           
            $this->db->bind(':updated_by',  $_SESSION['idUsuario']);
			$this->db->bind(':iddatosPruebasLaboratorio',  $datos['iddatosPruebasLaboratorio']);

            if ($this->db->execute()){           
                return 0; //se hizo el update
            }
            else{
                return -1;
            }
	}


}

?>
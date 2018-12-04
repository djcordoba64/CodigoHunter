<?php
/**
 * 
 */
class Laboratorio
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function crear($datos,$idcafe){
		$this->db->query( "SELECT * FROM datoslaboratorio where idcafe=:idcafe and iddatosLaboratorio =(select max(iddatosLaboratorio) from datoslaboratorio where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       
       if($fila!==true){
       		//preparamos la consulata
		$this->db->query('INSERT INTO datoslaboratorio (fechaHora,idCafe,perfildeTaza2,observacion,created_by) 
		VALUES (NOW(),:idcafe,:perfildeTaza2,:observacion,:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':perfildeTaza2', $datos['perfildeTaza2']);	
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
		$this->db->query("SELECT c.codigoCafe, d.iddatosLaboratorio,d.fechaHora,d.idcafe,d.perfildeTaza2,d.observacion from datoslaboratorio as d INNER JOIN cafes as c on c.idcafe=d.idcafe WHERE d.idcafe=:idcafe");
        $this->db->bind(':idcafe',$idcafe);
        $fila=$this->db->registro();
        return $fila;
	}

	public function actualizarDatos($datos){
		$this->db->query('UPDATE datoslaboratorio SET 
			perfildeTaza2=:perfildeTaza2,
			observacion=:observacion,
			updated_at= NOW(),
			updated_by = :updated_by 
            where iddatosLaboratorio=:iddatosLaboratorio');

            $this->db->bind(':perfildeTaza2',  $datos['perfildeTaza2']);
            $this->db->bind(':observacion',  $datos['observacion']);           
            $this->db->bind(':updated_by',  $_SESSION['idUsuario']);
			$this->db->bind(':iddatosLaboratorio',  $datos['iddatosLaboratorio']);

            if ($this->db->execute()){           
                return 0; //se hizo el update
            }
            else{
                return -1;
            }
	}


}
?>
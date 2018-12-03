<?php
/**
 * 
 */
class Torrefactor
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function crear($datos,$idcafe){
		$this->db->query( "SELECT * FROM datostorrefactor where idcafe=:idcafe and iddatosTorrefactor =(select max(iddatosTorrefactor) from datostorrefactor  where idcafe=:idcafe)" );
        $this->db->bind(':idcafe',$idcafe);     
       $fila=$this->db->registro();

       //var_dump($fila);
       if($fila!==true){
       		//preparamos la consulata
		$this->db->query('INSERT INTO datostorrefactor  (fechaHora,idCafe,enfriar,observacion,creted_at,created_by) 
		VALUES (NOW(),:idcafe,:enfriar,:observacion,NOW(),:created_by)
			 ');

			 //vinculamos los valores
			 $this->db->bind(':idcafe',$idcafe);
			 $this->db->bind(':enfriar', $datos['enfriar']);			
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
		$this->db->query("SELECT c.codigoCafe,d.iddatosTorrefactor, d.fechaHora,d.idcafe,d.enfriar,d.observacion from datostorrefactor as d INNER JOIN cafes as c on c.idcafe=d.idcafe WHERE d.idcafe=:idcafe");
        $this->db->bind(':idcafe',$idcafe);
        $fila=$this->db->registro();
        return $fila;
	}

	public function actualizarDatos($datos){
		$this->db->query('UPDATE datostorrefactor SET 
			enfriar=:enfriar,
			observacion=:observacion,
			updated_at= NOW(),
			updated_by = :updated_by 
            where iddatosTorrefactor=:iddatosTorrefactor');

            $this->db->bind(':enfriar',  $datos['enfriar']);
            $this->db->bind(':observacion',  $datos['observacion']);           
            $this->db->bind(':updated_by',  $_SESSION['idUsuario']);
			$this->db->bind(':iddatosTorrefactor',  $datos['iddatosTorrefactor']);

            if ($this->db->execute()){           
                return 0; //se hizo el update
            }
            else{
                return -1;
            }
	}
}

?>
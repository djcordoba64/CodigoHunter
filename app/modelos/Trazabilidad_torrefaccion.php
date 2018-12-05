<?php
/**
 * 
 */
class Trazabilidad_torrefaccion
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	public function reciboExiste($numero){
		$this->db->query( "SELECT count(1) as existe FROM  recepciones where numeroRecibo=:numeroRecibo " );
            $this->db->bind(':numeroRecibo',$numero);
            $fila=$this->db->registro();
            return $fila->existe==1;
	}

	 //obtener los datos del café
	 	 public function optenerDatos($numero){
	 	 	$this->db->query("SELECT r.Estado,r.numeroRecibo,r.created_at,r.correo,p.primerNombre,p.segundoNombre,p.primerApellido,p.segundoApellido FROM recepciones AS r inner join personas as p on p.idPersona=r.idcliente  WHERE numeroRecibo=:numeroRecibo ");
        	$this->db->bind(':numeroRecibo', $numero);
			$idrecepcion=$this->db->registro();
     		return $idrecepcion;
		  } 

	
}
?>
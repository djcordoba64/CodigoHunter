<?php
/**
 * 
 */
class EntregaCafe 
{
	
	function __construct()
	{
		$this->db = new Base;
	}

	//obtener cafes par gerar el informe
		public function obtenerCafes_Facturainforme($idRecepcion){
			$this->db->query("SELECT c.codigoCafe,c.peso,c.molidaMediaLibra,c.molidaLibra,c.molidaCincoLibras,c.granoMediaLibra,c.granoLibra,c.granoCincoLibras,c.agranel,t.created_at as FechaTrilla,t.mallas,t.pesoCafeVerde,t.mermaTrilla,e.mermaTueste,e.fechaHora as FechaTueste from estadostorrefaccion as e inner JOIN datostrilla as t on t.idcafe= e.idcafe INNER join cafes as c on c.idcafe =t.idcafe where e.codigoEstado= 'GTF' AND c.idRecepcion=:idRecepcion");	
			 $this->db->bind(':idRecepcion', $idRecepcion);	
            $cafes=$this->db->registros();
        return $cafes;


		}

	
}
?>
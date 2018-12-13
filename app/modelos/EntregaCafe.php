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
		$this->db->query("SELECT c.*,t.created_at as FechaTrilla,t.mallas,t.pesoCafeVerde,t.mermaTrilla,e.mermaTueste,e.fechaHora as FechaTueste from estadostorrefaccion as e inner JOIN datostrilla as t on t.idcafe= e.idcafe INNER join cafes as c on c.idcafe =t.idcafe where e.codigoEstado= 'GTF' AND c.idRecepcion=:idRecepcion");	
			 $this->db->bind(':idRecepcion', $idRecepcion);	
            $cafes=$this->db->registros();
        return $cafes;


	}

	 //consulto los datos para mostrarlos en el detalle de la entrega del café
        public function ConsultarDatos_detalle($idRecepcion){
        	$this->db->query("SELECT r.numeroRecibo,r.created_at,r.created_by,r.Estado,r.numeroContacto,r.correo,r.direccion,p.primerNombre,r.temperatura,p.primerApellido,p.documentoIdentidad, f.nombreFinca,f.vereda,m.municipio FROM recepciones as r  inner join personas as p on p.idPersona=r.idcliente INNER join detallefinca as f on f.idCliente=p.idPersona inner join municipios as m ON m.id_municipio=f.idmunicipio WHERE r.numerorecibo=:idRecepcion");
        	$this->db->bind(':idRecepcion',$idRecepcion);
        	 $fila=$this->db->registro();
            return $fila;

        }

	
}
?>
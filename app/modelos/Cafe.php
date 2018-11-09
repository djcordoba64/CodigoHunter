<?php
/**
 * 
 */
	 class Cafe 
	 {
	 	
	 	function __construct()
	 	{
	 		$this->db = new Base;
	 	}
	 
	 	 //--CREAR UN NUEVO CAFÉ----
	 	 public function crear(){
	 	 	$this->db->query("INSERT INTO cafes (idcafe,codigoCafe,peso,especie,variedad,porcentajeHumedad,factorRendimiento,tipoTueste,molidaMediaLibra,molidaLibra,granoMediaLibra,granoLibra,estado,foto,cantidad,valorUnitario,idmateriaPrima,idtipoBeneficio,created_at,created_by) VALUES (:idcafe,:codigoCafe,:peso,:especie,:variedad,:porcentajeHumedad,:factorRendimiento,:tipoTueste,:molidaMediaLibra,:molidaLibra,:granoMediaLibra,:granoLibra,:estado,:foto,:cantidad,:valorUnitario,idmateriaPrima,:idtipoBeneficio,:NOW(),:created_by)");


	 	 	//vinculamos los valores
	 	 	//vinculamos los valores
			 $this->db->bind(':codigoCafe' , $cafe['codigoCafe']);
			 $this->db->bind(':peso',$cafes['peso']);
			 $this->db->bind(':especie' , $cafe['especie']);
			 $this->db->bind(':variedad',$cafes['variedad']);
			 $this->db->bind(':porcentajeHumedad' , $cafe['porcentajeHumedad']);
			 $this->db->bind(':factorRendimiento',$cafes['factorRendimiento']);
			 $this->db->bind(':tipoTueste' , $cafe['tipoTueste']);
			 $this->db->bind(':molidaMediaLibra',$cafes['molidaMediaLibra']);
			
	 	 } 

	}
?>
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

	 	 //Validar si esta registrado el codigo del café
	 	 public function cafeExiste($codigoCafe){
            $this->db->query( "SELECT count(1) as existe FROM cafes where codigoCafe=:codigoCafe " );
            $this->db->bind(':codigoCafe',$codigoCafe);
            $fila=$this->db->registro();
            return $fila->existe==1;
        }


	 	 //obtener los datos del café
	 	 public function optenerDatoscafes($codigoCafe){
	 	 	$this->db->query("SELECT * FROM cafes WHERE codigoCafe=:codigoCafe ");
        	$this->db->bind(':codigoCafe', $codigoCafe);
			$idcafe=$this->db->registro();
     		return $idcafe;
	 	 } 


	}
?>
<?php 
/**
* 
*/
	class Municipio {
		private $db;

	    public function __construct(){
	    	$this->db = new Base;
		}
		//---Obtener los Municipios.---
		public function obtenerMunicipios(){
			$this->db->query('SELECT id_municipio, municipio FROM municipios');
			$listaMunicipios=$this->db->registros();
    		   return $listaMunicipios;
		}


	}


?>
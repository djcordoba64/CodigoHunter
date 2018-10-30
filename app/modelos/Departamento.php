<?php 
/**
* 
*/
	class Departamento {
		private $db;

	    public function __construct(){
	    	$this->db = new Base;
		}
		//---Obtener los Departamentos.---
		public function obtenerDepartamentos(){
			$this->db->query('SELECT id_departamento, departamento FROM departamentos ORDER BY departamento ASC');
			$listaDepartamentos=$this->db->registros();
    		   return $listaDepartamentos;
		}


	}


?>
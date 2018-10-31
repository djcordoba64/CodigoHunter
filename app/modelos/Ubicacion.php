<?php 

	class Ubicacion {
		private $db;
        var $id_departamento = "";

	    public function __construct(){
	    	$this->db = new Base;
		}

		//---Obtener los Departamentos.---
		public function obtenerDepartamentos(){

			$this->db->query('SELECT id_departamento, departamento FROM departamentos ORDER BY departamento ASC');
			$listaDepartamentos=$this->db->registros();
    		return $listaDepartamentos;
    	}
    	//----obtenerMunicipios---------------------------------
    	public function obtenerMunicipios(){
            
			$this->db->query("SELECT municipio, id_municipio, departamento_id FROM municipios order by  municipio ASC");
			$listaMunicipios=$this->db->registros();
    		 return $listaMunicipios;

		}


	}


?>
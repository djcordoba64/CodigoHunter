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

		public function obtenerNombresMunicipioId($idMunicipio){
            
			$this->db->query("SELECT m.municipio, d.departamento FROM municipios as m join departamentos as d on m.departamento_id=d.id_departamento where id_municipio=:id_municipio");
			$this->db->bind(':id_municipio',$idMunicipio);

			$datos=$this->db->registro();
    		 return $datos;

		}


	}


?>
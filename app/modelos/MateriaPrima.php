<?php 

	class MateriaPrima {
		private $db;

	    public function __construct(){
	    	$this->db = new Base;
		}

		//---Obtener los Departamentos.---
		public function obtenerMateriasPrimas(){

			$this->db->query('SELECT idmateriaprima, nombre, estado FROM materiaprima where estado = "Activo"  ORDER BY nombre ASC');
			$lista=$this->db->registros();
    		return $lista;
    	}
    	//----obtenerMunicipios---------------------------------
    	/*public function obtenerMunicipios(){
            
			$this->db->query("SELECT municipio, id_municipio, departamento_id FROM municipios order by  municipio ASC");
			$listaMunicipios=$this->db->registros();
    		 return $listaMunicipios;

		}

		public function obtenerNombresMunicipioId($idMunicipio){
            
			$this->db->query("SELECT m.municipio, d.departamento FROM municipios as m join departamentos as d on m.departamento_id=d.id_departamento where id_municipio=:id_municipio");
			$this->db->bind(':id_municipio',$idMunicipio);

			$datos=$this->db->registro();
    		 return $datos;

		}*/


	}


?>
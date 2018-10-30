<?php 
	/**
	* 
	*/
	class Departamentos
	{
		
		function __construct()
		{
			$this->departamentoModelo = $this->modelo('Departamento');
			$this->municipioModelo = $this->modelo('Municipio');
		}

		//llenar combo box con los departamentos.
		public function cargarDepartamentos(){
			$departamentos=$this->departamentoModelo->obtenerDepartamentos();

			$datosDepartamentos=[
				'id_departamento'=> $id_departamento->id_departamento,	
				'departamento'=> $departamentos->departamento				

			];
			 
			 echo var_dump($datosDepartamentos['id_departamento'])
			 //$this->vista('/Fincas/agregar',$datosDepartamentos);
					
		}
        //Cargar municipios
		public function cargarMunicipios(){
			
			$Municipios=$this->municipioModelo->obtenerMunicipios(){

				$datosMuni=[
					'municipios'=>$municipios
				];

				$this->vista('/Fincas/agregar',$municipios);
			}
		}

	}
 ?>
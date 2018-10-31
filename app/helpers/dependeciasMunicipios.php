<?php 

//include("clases/class.mysql.php");
include("modelos/Ubicacion.php");
$municipios = new Unicacion();
$municipios->id_departamento = $_GET["id_departamento"];
$municipios = $municipios->obtenerMunicipios();
foreach($municipios as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}

	
	/*class Municipios{

		function __construct()
		{
			
			$this->departamentoModelo = $this->modelo('Departamento');
		}

		//Cargar municipios
		public function cargarMunicipios(){
			$municipios->id_departamento = $_GET["id_departamento"];
			
			$municipios=$this->municipioModelo->obtenerMunicipios();

			foreach ($municipios as $key => $value) {
				echo "<option value=\"$key\">$value</option>";
			}
		}
	}
	*/


 ?>
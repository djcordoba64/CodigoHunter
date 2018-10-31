<?php
include("modelos/Ubicacion.php");

$ubicacion = new Ubicacion();
$departamentos = $ubicacion->obtenerDepartamentos();
foreach($departamentos as $key=>$value)
{
		echo "<option value=\"$key\">$value</option>";
}

/* 
	
	class Departamentos
	{
		
		function __construct()
		{
			$this->UbicacionModelo = $this->modelo('Ubicacion');
		}

		//llenar combo box con los departamentos.
		public function cargarDepartamentos(){
			$departamentos=$this->UbicacionModelo->obtenerDepartamentos();

			foreach ($departamentos as $key => $value) {
				echo "<option value=\"$key\">$value</option>";
			}								
		}
	*/
        

	}
 ?>
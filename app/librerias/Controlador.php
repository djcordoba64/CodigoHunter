<?php 
	
	/**
	* CLASE CONTROLADOR PRINCIPAL
		Se encargar de poder cargar los modelos y las vistas
	*/
	class Controlador {

		//cargar modelo
		public function modelo($modelo){
			require_once '../app/modelos/'. $modelo . '.php';

			//instanciar el modelo
			return new $modelo();
		}

		//cargar vista
		public function vista($vista, $datos = []){
			//chequear si el archivo vista existe
			if (file_exists('../app/vistas' . $vista . '.php')) {

				require_once '../app/vistas/' . $vista . '.php';
				//echo "$vista";

			}else {
				//si el archivo de la vista no existe
				die('la vista no existe');
				//echo "$vista";
			}

		}
	}

 ?>
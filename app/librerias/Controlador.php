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
		public function vista($vista, $datosParametro = []){
			//chequear si el archivo vista existe
			if (file_exists('../app/vistas/' . $vista . '.php')) {
				$datos = $datosParametro;
				require_once '../app/vistas/' . $vista . '.php';
				//echo "$vista";

			}else {
				//si el archivo de la vista no existe
				die('la vista ../app/vistas/' . $vista . '.php NO existe');
				//echo "$vista";
			}

		}

		public function renderErrorMessage($message){
			$errors_message=array('mensaje_error'=>$message);
			$this->render(__CLASS__, $params);
		}
	}

 ?>
<?php 
	
	class Paginas extends Controlador {

		public function __construct(){
			//instanciamos la clase del modelo.
			$this->personaModelo = $this->modelo('Persona');
			

		}
		public function index(){
		//Cuando ingreso al sistema es lo primero que se ve
			$this->vista('/paginas/inicio');
		}
	}

 ?>
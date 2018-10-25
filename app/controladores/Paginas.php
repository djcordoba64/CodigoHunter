<?php 
	
	class Paginas extends Controlador {

	
		public function index(){
		//Cuando ingreso al sistema es lo primero que se ve
			$this->vista('/paginas/inicio');
			
		}
	}

 ?>
<?php
	
	/**
	* 
	*/
	class Fincas extends Controlador
	{
		
		function __construct()
		{
			//instanciamos la clase del modelo Finca.
			$this->fincaModelo = $this->modelo('Finca');
		}
		//----Agregar finca--------------------------
		public function agregar(){

			
			if ($_SERVER['REQUEST_METHOD'] == 'POST'){

				$datosFinca=[				
					'nombreFinca'	=>trim($_POST['nombreFinca']),
					'Temperatura'	=>trim($_POST['Temperatura']),
					'coordenadasGogle'=>trim($_POST['coordenadasGogle']),
					'idMunicipio'	=>trim($_POST['idMunicipio']),
					'idCliente'		=>trim($_POST['idCliente']),
					'Estado'		=>trim($_POST['Estado']),
					'vereda'		=>trim($_POST['vereda']),
				];

					 //var_dump($datosFinca) ;
				if($this->fincaModelo->agregarFinca($datosFinca)){
					
					//redireccionar('/Fincas/agregar');
					

				}else{
					die ('Algo salio mal');
				}

			}else{
			}
		}
		//----------------------------------------------------------------
	
		

	}	
?>
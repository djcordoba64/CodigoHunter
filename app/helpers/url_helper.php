<?php 
	//para redireccionar la página

	function redireccionar($pagina){

		//  usar pagina como '/controlador/metodo'
		header('Location: '.RUTA_URL . $pagina);
	}


 ?>
<?php 
	/*papear la url ingresada en el navegador
	1-Controlador
	2-método
	3.-Parámetro
	Ej: /articulos/editar/4
	*/

	Class Core{
		protected $controladorActual='paginas';
		protected $metodoActual='index';
		protected $parametros=[];

		// constructor que se carga automaticamente una vez se carga la clase. 
		public function __construct(){
			//print_r($this->getUrl());
			$url= $this->getUrl();

			//Buscar en controladores si el controlador existe. (evaluar si la página existe)
			//Si existe se setea como controlador por defecto
			if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {

				$this->controladorActual=ucwords($url[0]);

				//para desmontar el controlADOR QUE EMPIEZA SIENDO PÁGINAS.
				unset($url[0]);
			}
			else 
			{
				die("controlador no encontrado");
			}
			//REQUERIMOS EL CONTROLADOR (EL NUEVO CONTROLADOR)
			require_once '../app/controladores/' .$this->controladorActual . '.php';
			$this->controladorActual= new $this->controladorActual;


			//Chequear la segunda parte de la url que sería el método.
			if (isset($url[1])) {
				
				if (method_exists($this->controladorActual,$url[1])) {
					//cuequeamos el método
					$this->metodoActual=$url[1];
					unset($url[1]);
				}
				else 
				{
					die("metodo no encontrado");
				}
			}			
			//echo "$this->metodoActual";
			//obtener los posibles parámetros
			$this->parametros=$url ? array_values($url): [];
			//traer los arreglos que se hayan configgurado en la url
			call_user_func_array([$this->controladorActual, $this->metodoActual],$this->parametros);

		}

		public function getUrl(){
			//echo $_GET['url']; //url sale de htaccess

			if (isset($_GET['url'])){
				$url=rtrim($_GET['url'],'/');
				$url=filter_var($url,FILTER_SANITIZE_URL);
				$url= explode('/', $url);

				return $url;
			}
		}
	}
 ?>
<?php 
	/*papear la url ingresada en el navegador
	1-Controlador
	2-método
	3.-Parámetro
	Ej: /articulos/editar/4
	*/
	// Start the session
 	if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

	Class Core{
		protected $controladorActual='Login';
		protected $metodoActual='index';
		protected $parametros=[];

		// constructor que se carga automaticamente una vez se carga la clase. 
		public function __construct(){

			
			//print_r($this->getUrl());
			$url= $this->getUrl();

			//Buscar en controladores si el controlador existe. (evaluar si la página existe)
			//Si existe se setea como controlador por defecto
			//echo 'Url solicitada: ';
			//echo '/'.implode('/', $url);

			$esLogin=false;

			if(is_null($url))
			{
				$this->controladorActual="Login";
				$esLogin=true;
			} 
			else if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {

				$this->controladorActual=ucwords($url[0]);

				if(ucwords($this->controladorActual)==ucwords('Login'))
				{
					$esLogin=true;
				}
				//para desmontar el controlADOR QUE EMPIEZA SIENDO PÁGINAS.
				unset($url[0]);
			}
			else 
			{
				

				die("ERROR!!! El Controlador :'".ucwords($url[0])."' NO existe; Url solicitada: /".implode('/',$url)." <a href='".RUTA_URL."'>ir al inicio</a>");
				//echo "$this->controladorActual";
			}
			//REQUERIMOS EL CONTROLADOR (EL NUEVO CONTROLADOR)
			require_once '../app/controladores/' .$this->controladorActual . '.php';
			$this->controladorActual= new $this->controladorActual;


			//Chequear la segunda parte de la url que sería el método.
			if (isset($url[1]) ) {
				
				if (method_exists($this->controladorActual,$url[1])) {
					//cuequeamos el método
					$this->metodoActual=$url[1];
					unset($url[1]);
				}
				else 
				{
					die("ERROR!!! El Metodo :'".ucwords($url[1])."' NO existe en el controlador".ucwords($url[0])." ; Url solicitada: /".implode('/',$url)." <a href='".RUTA_URL."'>ir al inicio</a>");
				}
			}			
			//echo "$this->metodoActual";
			//obtener los posibles parámetros
			$this->parametros=$url ? array_values($url): [];
			//traer los arreglos que se hayan configgurado en la url
			
			//Validar que haya una sesion iniciada y no sea una peticion de login:
			if(!isset($_SESSION['identificacion']) and !$esLogin)
			{
				//no es login y no tiene una sesion activa
				require_once '../app/controladores/Login.php';
				$parametros["mensaje_advertencia"]="No hay una sesión activa";
				call_user_func_array([new Login, "index"], $this->parametros);
			}
			else
			{
				// tiene una sesion activa
				call_user_func_array([$this->controladorActual, $this->metodoActual],$this->parametros);
			}
			
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
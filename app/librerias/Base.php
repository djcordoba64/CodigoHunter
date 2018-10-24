<?php 

//clase para conectarse a la base de datos y ejecutar consulta(PDO)
class Base{

	private $host = DB_HOST;
	private $usuario = DB_USUARIO;
	private $password= DB_PASSWORD;
	private $nombre_base = DB_NOMBRE;

	private $dbh; // significa dbh database handler
	private $stmt; //Sinifica statement (Que es el ejecutar una consulta)
	private $error;

	//configuramos la conexión
	public function __construct(){
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->nombre_base;
		$opciones= array(
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		);

		//CREAMOS UNA INSTANCIA DE PDO
		try{
			$this->dbh = new PDO($dsn, $this->usuario, $this->password,$opciones);
			$this->dbh->exec('Set names utf8'); //para los carácteres especiales
		}catch(PDOException $e){
			$this->error= $e->getMessage();
			echo $this->error;
		}
	}
		//Recibimos la sentencia sql --preparamos consulta
	public function query($sql){
			$this->stmt= $this->dbh->prepare($sql);
	}
		//parametrizamos la consulta (vinculamos LA CONSULTA CON BIND)
	public function bind($parametro , $valor, $tipo=null){
		if (is_null($tipo)){
			switch (true) {

				case is_int($valor):
					$tipo=PDO::PARAM_INT;
					break;

				case is_bool($valor):
					$tipo=PDO::PARAM_BOOL;
					break;
				

				case is_null($valor):
					$tipo=PDO::PARAM_NULL;
					break;
					
			default:
				$tipo=PDO::PARAM_STR;
				break;
				}
		}
		//echo $parametro;
			$this->stmt->bindValue($parametro,$valor,$tipo);
	}

		//Ejecutamos la consulta
	public function execute(){
			return $this->stmt->execute();
	}

		//OBTENEMOS LOS REGISTROS
	public function registros(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}

		//OBTENEMOS UN SOLO REGISTRO
	public function registro(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}

		//OBTENEMOS LA CANTIDAD DE REGISTROS CON EL MÉTODO ROWCOUNT
	public function rowCount(){
		return $this->stmt->rowCount();
	}
}

?>
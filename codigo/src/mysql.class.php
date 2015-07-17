<?php
/**
* Clase para generar instancias de conexión a la base de datos.
* Como la librería MySQL por defecto está deprecada por problemas de seguridad
* la clase 'mysql' se adaptó para usar PDO (Extensión de Datos de PHP).
* 
* Documentación de PDO: http://php.net/manual/es/book.pdo.php
* 
* @author	Sebastián Berlati <sberlati@gmail.com>
* @date		10/07/2015
*/
class mysql {
	private $hostname = 'localhost';
	private $username = 'prueba';
	private $password = '1234';
	private $database = 'tportega';

	private $link;
	
	/**
	* Constructor de la clase. Crea la conexión y settea el tipo de muestreo de error en caso de haberlo.
	* 
	* @throws	 PDOException	Si ocurre un error al crear la instancia
	*/
	public function __construct() {
		try {
			$this->link = new PDO('mysql:host=' . $this->hostname . ';dbname=' . $this->database, $this->username, $this->password);
			$this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	/**
	* Devuelve el link de conexión a la base de datos
	* 
	* @return	PDO
	*/
	public function getInstance() {
		return $this->link;
	}
	
	/**
	* Destruye la variable con la conexión a la base
	*/
	public function closeInstance() {
		unset($this->link);
	}
}
?>
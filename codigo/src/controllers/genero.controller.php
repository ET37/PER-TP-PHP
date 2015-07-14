<?php
/**
* Clase controlador de la entidad GENERO.
* 
* @author 	Sebastián Berlati
* @date 	14/07/2015
*/

/**
* Llamo a la clase entidad para GENERO, ya que la voy a usar
* para crear un array con todos los géneros encontrados en la BD,
* tal y como hacíamos en Java con el arraylist, solo que en PHP no hay
* tipo de dato, por lo que en vez de usar un arraylist, usamos simplemente
* un array.
*/
require_once '/entities/genero.class.php';

class generoController {
	private $generos;		//Este será el array que va a guardar los géneros, y al que consultaremos en los métodos
	private $connection;	//Acá se almacenará la instancia de conexión a la base de datos.

	/**
	* Constructor de la clase. Le decimos que la variable $generos es un array,
	* y que la variable $connection es la conexión que se pasó por parámetro.
	*/
	public function __construct($connection) {
		$this->generos = array();
		$this->connection = $connection;

		$this->loadContent();
	}	

	/**
	* Obtiene todos los géneros ordenados por ID de la base de datos,
	* y los almacena en el array de la clase llamado $generos. De ahora en más,
	* cuando se busque un género se tiene que buscar en el array y NO en la BD.
	*/
	private function loadContent() {
		try {

		/**
		* Con esto nos fijamos si efectivamente hay una conexión establecida y si
		* es una conexión válida. Si no se cumple algo, genera una excepción.
		*/
		if(empty($this->connection) || !is_object($this->connection))
			throw new Exception("No hay una conexión establecida.");

		//Ejecuto una consulta a la base de datos
		$query = $this->connection->query("SELECT id_genero, nombre FROM generos ORDER BY id_genero DESC");

		//Cada fila de resultado es una nueva clase 'Genero' almacenada en $generos
		foreach($query->fetchAll() as $row)
			$this->generos[] = new Genero($row['id_genero'], $row['nombre']);

		} catch(PDOException $e) {
			new error($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), true);
		} catch(Exception $e) {
			new error($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), true);
		}
	}

	/**
	* Devuelve un objeto genero si encuentra uno por el ID pasado por parámetro
	*/
	public function getGeneroById($id) {
		try {
		if(empty($this->connection) || !is_object($this->connection))
			throw new Exception("No hay una conexión establecida.");

			/**
			* Este es el método de busca en un array. Es idéntico a como hacíamos en Java.
			* Toma cada campo del array $this->generos y lo llama $genero. Una vez que hace eso,
			* nosotros nos fijamos si la propiedad "id_genero" coincide con la pasada por parámetro.
			* Si coinciden, se devuelve el objeto; caso contrario devuelve NULL.
			*/
			foreach ($this->generos as $genero) {
				if(is_object($genero)) {
					if($genero->__get("id_genero"))
						return $genero;
				}else{
					throw new Exception("Un campo del array no es un objeto");
				}
			}
			return null;
		}catch(PDOException $e) {
			new error($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), true);
		}catch(Exception $e) {
			new error($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), true);
		}
	}

	/**
	* Devuelve un objeto genero si encuentra por el NOMBRE pasado por parámetro
	*/
	public function getGeneroByNombre($nombre) {
		try {
		if(empty($this->connection) || !is_object($this->connection))
			throw new Exception("No hay una conexión establecida.");

			/**
			* Es lo mismo que se explicó en el método anterior, solo que ahora busca
			* por la propiedad "nombre".
			*/
			foreach ($this->generos as $genero) {
				if(is_object($genero)) {
					if($genero->__get("nombre"))
						return $genero;
				}else{
					throw new Exception("Un campo del array no es un objeto");
				}
			}
			return null;
		}catch(PDOException $e) {
			new error($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), true);
		}catch(Exception $e) {
			new error($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine(), true);
		}	
	}
}

?>

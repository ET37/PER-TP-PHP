<?php
/**
* Entidad ALBUM del sistema. Contiene los mismos campos que en la base de datos, y
* lo correcto sería generar listas de esta clase para mantener el manejo de objetos.
* 
* @author Sebastián Berlati
* @date 10/07/2015
*/
class Album {
	private $id_album;
	private $id_artista;
	private $id_genero;
	private $nombre;
	private $descripcion;
	
	/**
	* Constructor de la clase.
	*/
	public function __construct($id_album, $id_artista, $id_genero, $nombre, $descripcion) {
		$this->id_album		 = $id_album;
		$this->id_artista	 = $id_artista;
		$this->id_genero	 = $id_genero;
		$this->nombre		 = $nombre;
		$this->descripcion	 = $descripcion;
	}

	/**
	* Encapsulamiento de las variables de la entidad. ¡Es tan fácil en PHP!
	*/
	public function __get($property) {
		if(property_exists($this, $property)) 
			return $this->$property;
	}
	
	public function __set($property, $value) {
		if(property_exists($this, $property))
			$this->$property = $value;
		return $this->$property;
	}
}

?>
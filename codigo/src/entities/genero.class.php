<?php
/**
* Entidad GENERO del sistema. Contiene los mismos campos que en la base de datos, y
* lo correcto sería generar listas de esta clase para mantener el manejo de objetos.
* 
* @author Sebastián Berlati
* @date 10/07/2015
*/
class Genero {
	private $id_genero;
	private $nombre;
	
	/**
	* Constructor de la clase.
	*/
	public function __construct($id_genero, $nombre) {
		$this->id_genero	 = $id_genero;
		$this->nombre		 = $nombre;
	}
	
	/**
	* Encapsulamiento de propieades.
	*/
	public function __get($property) {
		if(property_exists($property))
			return $this->$property;
	}
	
	public function __set($property, $value) {
		if(property_exists($property))
			$this->$property = $value;
		return $this->$property;
	}
}
?>
<?php
/**
* Entidad ARTICULO del sistema. Contiene los mismos campos que en la base de datos, y
* lo correcto sería generar listas de esta clase para mantener el manejo de objetos.
* 
* @author Sebastián Berlati
* @date 10/07/2015
*/
class Articulo {
	private $id_articulo;
	private $id_album;
	private $id_usuario;
	private $stock;
	private $precio;
	
	/**
	* Constructor de la clase.
	*/
	public function __construct($id_articulo, $id_album, $id_usuario, $stock, $precio) {
		$this->id_articulo	 = $id_articulo;
		$this->id_album		 = $id_album;
		$this->id_usuario	 = $id_usuario;
		$this->stock		 = $stock;
		$this->precio		 = $precio;
	}
	
	/**
	* Encapsulamiento de las propiedades.
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
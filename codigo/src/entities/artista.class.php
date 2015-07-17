<?php

class Artista {
	private $id_artista;
	private $nombre;
	
	public function __construct($id_artista, $nombre) {
		$this->id_artista = $id_artista;
		$this->nombre = $nombre;
	}
	
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
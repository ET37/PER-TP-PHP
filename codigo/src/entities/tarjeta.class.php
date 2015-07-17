<?php

class Tarjeta {
	private $id_tarjeta;
	private $id_usuario;
	private $tipo_tarjeta;
	private $codigo_tarjeta;
	private $clave_tarjeta;
	
	public function __construct($id_tarjeta, $id_usuario, $tipo_tarjeta, $codigo_tarjeta, $clave_tarjeta) {
		$this->id_tarjeta = $id_tarjeta;
		$this->id_usuario = $id_usuario;
		$this->tipo_tarjeta = $tipo_tarjeta;
		$this->codigo_tarjeta = $codigo_tarjeta;
		$this->clave_tarjeta = $clave_tarjeta;
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
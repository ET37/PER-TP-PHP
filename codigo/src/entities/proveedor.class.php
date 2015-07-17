<?php

class Proveedor {
	private $id_proveedor;
	private $id_usuario;
	private $cuit;
	private $calle;
	private $cod_postal;
	
	public function __construct($id_proveedor, $id_usuario, $cuit, $calle, $cod_postal) {
		$this->id_proveedor = $id_proveedor;
		$this->id_usuario = $id_usuario;
		$this->cuit = $cuit;
		$this->calle = $calle;
		$this->cod_postal = $cod_postal;
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
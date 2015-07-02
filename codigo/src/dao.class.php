<?php

require_once 'mysql.class.php';

class dao {
	private $database;

	public function __construct() {
		$this->database = new mysql();
	}		

	//Listado de cada tabla =================================================================
	public function listarAlbumes($order = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_album, id_artista, id_genero, nombre, descripcion FROM albums ORDER BY id_album " . $order);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_album"	 => $row['id_album'],
								 "id_artista"	 => $row['id_artista'],
								 "id_genero"	 => $row['id_genero'],
								 "nombre"		 => $row['nombre'],
								 "descripcion"	 => $row['descripcion']);
			}
			return $return;
		}
	}

	public function listarArticulos($oder = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_articulo, id_album, id_usuario, stock, precio FROM articulos ORDER BY id_articulo " . $order);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_articulo"	 => $row['id_articulo'],
								 "id_artista"	 => $row['id_artista'],
								 "id_genero"	 => $row['id_genero'],
								 "nombre"		 => $row['nombre'],
								 "descripcion"	 => $row['descripcion']);
			}
			return $return;
		}
	}

	public function listarArtistas($order = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_artista, nombre FROM artistas ORDER BY id_artista " . $order);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_artista"	 => $row['id_artista'],
								  "nombre"		 => $row['nombre']);
			}
			return $return;
		}
	}

	public function listarGeneros($order = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_genero, nombre FROM generos ORDER BY id_genero " . $order);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_genero"	 => $row['id_genero'],
								  "nombre"		 => $row['genero']);
			}
			return $return;
		}			
	}

	public function listarProveedores($order = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_proveedor, id_usuario, cuit, calle, cod_postal FROM proveedores ORDER BY id_proveedor " . $order);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_proveedor"	 => $row['id_proveedor'],
							 "id_usuario"	 => $row['id_usuario'],
							 "cuit"			 => $row['cuit'],
							 "calle"		 => $row['calle'],
							 "cod_postal"	 => $row['cod_postal']);
			}
			return $return;
		}
	}

	public function listarTarjetasCredito($order = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_tarjeta, id_usuario, tipo_tarjeta, codigo_tarjeta, clave_tarjeta FROM tarjetas_credito ORDER BY id_tarjeta " . $order);
		
		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_tarjeta"		 => $row['id_tarjeta'],
								 "id_usuario"		 => $row['id_usuario'],
								 "tipo_tarjeta"		 => $row['tipo_tarjeta'],
								 "codigo_tarjeta"	 => $row['codigo_tarjeta'],
								 "clave_tarjeta"	 => $row['clave_tarjeta']);
			}
			return $return;
		}		
	}

	public function listarUsuarios($order = 'DESC') {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_usuario, nombre_usuario, password, nombre, apellido, num_doc, tipo_usuario FROM usuarios ORDER BY id_usuario " . $order);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_usuario"		 => $row['id_usuario'],
								 "nombre_usuario"	 => $row['nombre_usuario'],
								 "password"			 => $row['password'],
								 "nombre"			 => $row['nombre'],
								 "apellido"			 => $row['apellido'],
								 "num_doc"			 => $row['num_doc'],
								 "tipo_usuario"		 => $row['tipo_usuario']);
			}
			return $return;
		}
	}

	/* GET por parámetros ======================================================================
	 * Se le pasa como parámetro el nombre del campo por el que se quiere buscar y
	 * el valor que tiene que tener ese campo.
	 */
	public function getAlbumsByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_album, id_artista, id_genero, nombre, descripcion FROM albums WHERE " . $param . " = " . $value)
				 or die("Error al ejecutar la consulta. Revisa que el nombre del campo exista.");

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_album"	 => $row['id_album'],
								 "id_artista"	 => $row['id_artista'],
								 "id_genero"	 => $row['id_genero'],
								 "nombre"		 => $row['nombre'],
								 "descripcion"	 => $row['descripcion']);
			}
		}else{
			return 0;
		}
	}

	public function getArticulosByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_articulo, id_album, id_usuario, stock, precio FROM articulos WHERE " . $param . " = " . $value);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_articulo"	 => $row['id_articulo'],
									 "id_artista"	 => $row['id_artista'],
									 "id_genero"	 => $row['id_genero'],
									 "nombre"		 => $row['nombre'],
									 "descripcion"	 => $row['descripcion']);
			}
			return $return;
		}else{
			return 0;
		}
	}

	public function gerArtistasByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_artista, nombre FROM artistas WHERE " . $param . " = " . $value);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_artista"	 => $row['id_artista'],
								  "nombre"		 => $row['nombre']);
			}
			return $return;
		}
	}

	public function getGenerosByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_genero, nombre FROM generos WHERE " . $param . " = " . $value);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_genero"	 => $row['id_genero'],
								  "nombre"		 => $row['genero']);
			}
			return $return;
		}	
	}

	public function getProveedoresByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_proveedor, id_usuario, cuit, calle, cod_postal FROM proveedores WHERE " . $param . " = " . $value);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_proveedor"	 => $row['id_proveedor'],
							 "id_usuario"	 => $row['id_usuario'],
							 "cuit"			 => $row['cuit'],
							 "calle"		 => $row['calle'],
							 "cod_postal"	 => $row['cod_postal']);
			}
			return $return;
		}
	}

	public function getTarjetasCreditoByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_tarjeta, id_usuario, tipo_tarjeta, codigo_tarjeta, clave_tarjeta FROM tarjetas_credito WHERE " . $param . " = " . $value);
		
		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_tarjeta"		 => $row['id_tarjeta'],
							 "id_usuario"		 => $row['id_usuario'],
							 "tipo_tarjeta"		 => $row['tipo_tarjeta'],
							 "codigo_tarjeta"	 => $row['codigo_tarjeta'],
							 "clave_tarjeta"	 => $row['clave_tarjeta']);
			}
			return $return;
		}		
	}

	public function getUsuariosByParameter($param, $value) {
		if(!$database->getLink())
			throw new Exception("No hay una conexión con la base...");

		$query = mysql_query("SELECT id_usuario, nombre_usuario, password, nombre, apellido, num_doc, tipo_usuario FROM usuarios WHERE " . $param . " = " . $value);

		if(mysql_num_rows($query) > 0) {
			$return = array();
			while($row = mysql_fetch_assoc($query)) {
				$return[] = array("id_usuario"		 => $row['id_usuario'],
							 "nombre_usuario"	 => $row['nombre_usuario'],
							 "password"			 => $row['password'],
							 "nombre"			 => $row['nombre'],
							 "apellido"			 => $row['apellido'],
							 "num_doc"			 => $row['num_doc'],
							 "tipo_usuario"		 => $row['tipo_usuario']);
			}
			return $return;
		}
	}	

}

?>
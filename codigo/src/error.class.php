<?php
/**
* Esta clase se instancia cada vez que ocurre un error/excepción. Se hizo
* más que nada para personalizar el muestreo al usuario del error, y registrar
* en un log los errores para poder verlos más adelante.
* 
* @author	Sebastián Berlati
* @date		10/07/2015
*/

class error {
	private static $critical_default	 = true;				// Si todos los errores son críticos por defecto
	private static $enable_log_writing	 = false;				// Habilitar o no la escritura de errores en el log
	private static $log_filename		 = '/error_log.txt';	// Nombre del archivo donde se graban los mensajes
	
	/**
	* Constructor de la clase que recibe básicamente lo que contiene el objeto
	* de la excepción. 
	* 
	* Para obtener un ejemplo de los métodos que tiene un objeto de excepción, podemos revisar
	* el siguiente link: http://php.net/manual/es/language.exceptions.php#91159
	*/
	public function __construct($message, $code, $file, $line, $critical = $self::$critical_default) {
		if(self::$enable_log_writing)
			$this->writeLogEntry($message, $code, $file, $line);
		if($critical)
			$this->writeErrorPage($message);
	}
	
	/**
	* Escribe un mensaje en pantalla para el usuario. Es imporante que se evite
	* dar información de más al usuario final sobre el error, así como evitar que
	* se muestren nombres de los archivos del sistema, etc
	*/
	private function writeErrorPage($message) {
		echo '<h3>Ha ocurrido un error</h3><br><br>' . $message . '<br>Lamentamos las molestias. ';
		if(self::$enable_log_writing) echo 'Se ha enviado un informe y el equipo lo leerá en breve.';
	}
	
	/**
	* Si la propiedad $enable_log_writing es TRUE, se procede a escribir en el log
	* (definido en la propiedad $log_filename) información de la excepción de forma
	* detallada para su revisión
	*/
	private function writeLogEntry($message, $code, $file, $line) {
		try {
			$logMessage = '[' . date('d/m/Y H:i:s') . '] Cód ' . $code . ' en ' . $file . ' línea ' . $line . ' - ' . $message . PHP_EOL;
			file_put_contents(self::log_filename, $logMessage, FILE_APPEND);
		} catch(Exception) {
			die('Esto es el colmo. Intenta más tarde...');
		}
	}
}
?>
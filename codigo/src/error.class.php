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
	
	public function __construct($message, $code, $file, $line, $critical = $self::$critical_default) {
		if(self::$enable_log_writing)
			$this->writeLogEntry($message, $code, $file, $line);
		if($critical)
			$this->writeErrorPage($message);
	}
	
	private function writeErrorPage($message) {
		echo '<h3>Ha ocurrido un error</h3><br><br>' . $message . '<br>Lamentamos las molestias. ';
		if(self::$enable_log_writing) echo 'Se ha enviado un informe y el equipo lo leerá en breve.';
	}
	
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
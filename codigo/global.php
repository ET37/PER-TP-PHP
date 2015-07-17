<?php
session_start();
define('VALID',			 true						);
define('DS',			 DIRECTORY_SEPARATOR		);
define('ROOT',			 dirname(__FILE__)			);
define('SRC',			 ROOT . DS . 'src' . DS		);
define('CONTROLLERS',	 SRC . 'controllers' . DS	);
define('ENTITIES',		 SRC . 'entities' . DS		);

require_once SRC . 'mysql.class.php';
require_once SRC . 'error.class.php';

$sql = new mysql();

?>
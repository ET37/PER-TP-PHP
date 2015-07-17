<?php
session_start();
define('VALID', true);
define('SRC_DIR', '/src/');
define('CONTROLLER_DIR', SRC_DIR . '/controllers/');

require_once SRC_DIR . 'mysql.class.php';
require_once SRC_DIR . 'error.class.php';

$sql = new mysql();

?>
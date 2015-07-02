<?php
	
class mysql {
	private $hostname;
	private $username;
	private $password;
	private $database;

	private $link;

	public function __construct() {
		$this->link = mysql_connect($this->hostname, $this->username, $this->password) or die(mysql_error());
		mysql_select_db($this->database, $this->link) or die(mysql_error());
	}

	public function getLink() {
		return $this->link;
	}

	public function destroy() {
		mysql_close($this->link);
	}
}
?>
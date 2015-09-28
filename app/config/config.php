<?php
/****************************************************/
/*													*/
/*													*/
/*													*/
/*													*/
/*													*/
/****************************************************/

session_start();

class dbconfig {

	protected $host;
	protected $user;
	protected $pass;
	protected $db;
	
	function dbconfig() {
		$this -> host = 'localhost';
		$this -> user = 'roaming_tech';
		$this -> pass = 'L*I,HoGs_Lm#';
		$this -> db = 'roaming_asms';
	}
}


?>
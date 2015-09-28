<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/config/config.php');

class Mysql extends dbconfig {

	public $connectionString;
	public $dataSet;
	private $sqlQuery;
	
	protected $db;
	protected $host;
	protected $user;
	protected $pass;
		
	function Mysql(){
		$this -> connectionString = NULL;
		$this -> sqlQuery = NULL;
		$this -> dataSet = NULL;
		
		$dbPara = new Dbconfig();
		$this -> db = $dbPara -> db;
		$this -> host = $dbPara -> host;
		$this -> user = $dbPara -> user;
		$this -> pass = $dbPara ->pass;
		$dbPara = NULL;
	}
	
	function dbConnect(){
		$this -> connectionString = mysqli_connect($this -> host,$this -> user,$this -> pass, $this -> db);
		return $this -> connectionString;
	}
	
	function dbDisconnect() {
		$this -> connectionString = NULL;
		$this -> sqlQuery = NULL;
		$this -> dataSet = NULL;
		$this -> db = NULL;
		$this -> Name = NULL;
		$this -> user = NULL;
		$this -> pass = NULL;
	}
	
	function selectAll($tableName){
		$this -> sqlQuery = 'SELECT * FROM '.$this -> db.'.'.$tableName;
		$this -> dataSet = mysqli_query($this -> connectionString,$this -> sqlQuery);
		return $this -> dataSet;
	}
	
	function selectWhere($tableName,$rowName,$operator,$value,$valueType) {
		$this -> sqlQuery = 'SELECT * FROM '.$tableName.' WHERE '.$rowName.' '.$operator.' ';
		if($valueType == 'int') {
			$this -> sqlQuery .= $value;
		}
		else if($valueType == 'char') {
			$this -> sqlQuery .= "'".$value."'";
		}
		$this -> dataSet = mysqli_query($this -> connectionString,$this -> sqlQuery);
		$this -> sqlQuery = NULL;
		return $this -> dataSet;
		#return $this -> sqlQuery;
	}
	
	function insertInto($tableName,$values) {
		$i = count($values);
		$a = 0;
		
		$this -> sqlQuery = 'INSERT INTO '.$tableName.'(';
		
		foreach ($values as $key=>$val) {
			$a++;
			$fields .= $key;
			if ($a < $i) {
				$fields .= ',';
			}
			$value .= "'".$val."'";			
			if ($a < $i) {
				$value .= ',';
			}
		}
		$this -> sqlQuery .= $fields . ') VALUES (' . $value . ")";
		$query = mysqli_query($this ->connectionString,$this -> sqlQuery);
		return $query;
	}
	
	function updateInfo($tableName, $values, $where) {
		$i = count($values);
		$a = 0;
		
		$this -> sqlQuery = 'UPDATE ' . $tableName . ' SET ';
		
		foreach ($values as $key=>$val) {
			$a++;
			if($key != "ID") {
				$fields .= $key.'='.'"'.$val.'"';
				if ($a < $i) {
					$fields .= ', ';
				}
			}
		}
		$this -> sqlQuery .= $fields . " WHERE " . $where;
		
		$query = mysqli_query($this ->connectionString,$this -> sqlQuery);
		return $query;
	}
	
	function selectFreeRun($query){
		$this -> dataSet = mysqli_query($this -> connectionString,$query);
		return $this -> dataSet;
	}
	
	function freeRun($query){
		return mysqli_query($this -> connectionString,$query);
	}
}
?>
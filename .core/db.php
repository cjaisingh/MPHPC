<?php
class DB {
	// Setup class public variables
	
	// Setup class private variables
	private $connection = false;
	private $errors = array();
	
	// Setup Public Functions
	public function __construct($settings = false){
		// Get the settings
		if($settings == false){
			$settings = $GLOBALS['SITE']->getSettings();
		}
		// Ceate connection from settings defined
		$this->connection = mysql_connect(
			$settings['DATABASE']['host'],
			$settings['DATABASE']['username'],
			$settings['DATABASE']['password']
		);
		unset($settings);
		$this->errorLog();
	}
	
	public function __destruct(){
		// Unset the connection
		unset($this->connection);
		// Unset the errors
		unset($this->errors);
		// Unset the object
		unset($this);
	}
	
	public function query($sql){
		// If we have a connection
		if($this->connection != false){
			// Query using the defined connection
			$returnValue = mysql_query($sql,$this->connection);
		} else {
			// We don't have a connection, return false
			$returnValue = false;
		}
		$this->errorLog();
		return $returnValue;
	}
	
	public function close(){
		// If we have a connection
		if($this->connection != false){
			// Close the connection
			mysql_close($this->connection);
		}
		$this->__destruct();
		return true;
	}
	
	public function getErrors(){
		return $this->errors;	
	}
	
	// Setup Private Functions
	private function errorLog(){
		$error = mysql_error($this->connection);
		if($error != false){
			array_push($this->errors,$error);
		}
		unset($error);
	}
};
?>
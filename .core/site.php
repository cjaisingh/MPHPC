<?php
class Site {
	// Setup class public variables
	
	// Setup class private variables
	private $settings;
	
	// Setup Constructor
	public function __construct(&$settings){
		// Setup Environment Constants
		foreach($settings['constants'] as $row => $value){
			define($row,$value);
		}
		$this->settings = $settings;
	}
	// Setup Public Functions
	public function getSettings(){
		return $this->settings;	
	}
	// Setup Private Functions
}
?>
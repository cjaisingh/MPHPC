<?php
class Site {
	// Setup class public variables
	
	// Setup class private variables
	private $settings;
	private $startTime;
	
	// Setup Constructor
	public function __construct(&$settings){
		// If this is a dev environment
		if($settings['constants']['ENVIRONMENT'] == 'DEV'){
			// Setup Page Timer
			$this->startTime = microtime();
			$this->startTime = explode(' ', $this->startTime);
			$this->startTime = $this->startTime[1] + $this->startTime[0];
		}
		
		// Setup Environment Constants
		foreach($settings['constants'] as $row => $value){
			define($row,$value);
		}
		$this->settings = $settings;
		if(isset($settings['database'])){
			// Setup Database
			require_once('db.class.php');	
		}
		if(isset($settings['users'])){
			session_save_path(str_replace('.core/site.class.php','.sessions/',__FILE__));
			ini_set('session.gc_probability', 1);
			require_once('user.class.php');
		}
	}
	// Setup Public Functions
	public function getSettings(){
		return $this->settings;	
	}
	
	public function getStartTime(){
		return $this->startTime;	
	}
	// Setup Private Functions
	private function __autoload($class_name) {
    	require_once strtolower($class_name) . 'class.php';
	}
}
?>
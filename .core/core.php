<?php
// Get Site Settings
require_once('../.settings/settings.php');

if(isset($settings)){
	// Create Site
	require_once('site.class.php');
	$GLOBALS['SITE'] = new Site($settings);

	// Get the page class
	require_once('page.class.php');
}
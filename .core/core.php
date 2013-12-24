<?php
// Define Configuration Options
$settings = array(
	'constants' => array(
		'SITE_NAME' => 'local.myphpc.theryanhowell.co.uk',
		'ENVIRONMENT' => 'DEV'
	),
	'database' => array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => 'rnebcmzemvbn',
		'databasename' => 'myphpc'
	)
);
// Create Site
require_once('site.php');
$GLOBALS['SITE'] = new Site($settings);

// Setup Database
require_once('db.php');


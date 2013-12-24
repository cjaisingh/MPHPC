<?php
// Define Configuration Options
$settings = array(
	'constants' => array(
		'SITE_DOMAIN' => 'local.myphpc.theryanhowell.co.uk',
		'SITE_NAME' => 'MPHPC',
		'ENVIRONMENT' => 'DEV'
	),
	'database' => array(
		'host' => 'localhost',
		'username' => 'root',
		'password' => 'rnebcmzemvbn',
		'databasename' => 'mphpc'
	),
	'urlRewrites' => true
);
// Create Site
require_once('site.class.php');
$GLOBALS['SITE'] = new Site($settings);

// Get the page class
require_once('page.class.php');
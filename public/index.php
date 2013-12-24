<?php
require_once('../.core/core.php');
$pageSettings = array(
	'views' => array(
		'header' => array(
			'pageName' => 'Index'
		),
		'body' => true,
		'footer' => true
	),
);
$thisPage = new Page($pageSettings);
$body = &$thisPage->body;

$database = new DB();
$database->query('SELECT * FROM users');
$row = $database->getAssociativeResult();
$database->close();

$body .= $row[0]['name'];

$thisPage->render();
?>
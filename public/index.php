<?php
require_once('../.core/core.php');
$database = new DB();
$query = $database->query('SELECT * FROM users');
var_dump($database);
$database->close();
var_dump($GLOBALS['SITE']->getSettings());
?>
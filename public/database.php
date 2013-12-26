<?php
require_once('../.core/core.php');
$pageSettings = array(
	'views' => array(
		'header' => array(
			'pageName' => 'Database',
			'css' => array(
				'main' => true
			),
			'js' => array(
				'main' => true
			)
		),
		'body' => true,
		'footer' => true
	),
	'forms' => true
);
$thisPage = new Page($pageSettings);
$body = &$thisPage->body;

$database = new DB();
$database->query('SELECT * FROM users');
$row = $database->getAssociativeResult();
$database->close();

// Render Header
$thisPage->renderView('header');
?>
<article id="article1">
	<h1>Database</h1>
	<div class="articleBody clear">
		<p>Database Instructions</p>
	</div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
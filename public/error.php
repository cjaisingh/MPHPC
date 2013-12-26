<?php
require_once('../.core/core.php');
$pageSettings = array(
	'views' => array(
		'header' => array(
			'pageName' => 'Error',
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

// Render Header
$thisPage->renderView('header');
?>
<article id="article1">
	<h1>Error</h1>
	<div class="articleBody clear">
		<p>Error Instructions</p>
	</div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
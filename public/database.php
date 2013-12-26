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

// Render Header
$thisPage->renderView('header');
?>
<article id="article1">
	<h1>Database</h1>
	<div class="articleBody clear">
		<p>The database connection is defined in .settings/settings.php, this uses mysql (mainly because <a href="https://github.com/facebook/hhvm">hhvm</a> does not support mysqli).</p>
		<p>You can use the database class by creating a database object:</p>
		<p>$database = new DB();</p>
		<p>Running your sql query:</p>
		<p>$database-&gt;query('SELECT * FROM users');</p>
		<p>Getting the result:</p>
		<p>	$result = $database-&gt;getResult();</p>
		<p>$associativeResult = $database-&gt;getAssociativeResult();</p>
		<p>$resultRow = $database-&gt;getRow();</p>
		<p>$resultAssociativeRow = $database-&gt;getAssociativeRow();		</p>
		<p>Closing the connection (this isn't needed, but it's nice to clean up after yourself instead of keeping unneeded connections open.</p>
		<p>$database-&gt;close();</p>
	</div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
<?php
require_once('../.core/core.php');
$pageSettings = array(
	'views' => array(
		'header' => array(
			'pageName' => 'Hooks',
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
	<h1>Hooks</h1>
	<div class="articleBody clear">
		<p>Hooks are stored in .hooks, these are predefined scripts that should be ran when such an event happens.</p>
		<h2>Post-Recieve</h2>
		<p>.hooks/post-recieve.php is the script that should be ran upon a push to the server, with new content.</p>
		<p>This script runs automatic compilation of all sass and js files.</p>
		<p>This script requires: </p>
		<ol role="list">
			<li role="listitem"><a href="http://dl.google.com/closure-compiler/compiler-latest.zip">Closure Compiler</a> in /bin/closure-compiler.jar (this requires the <a href="http://www.oracle.com/technetwork/java/javase/downloads/index.html">java runtime environment</a>).</li>
			<li><a href="http://sass-lang.com/install">SASS</a> command-line (should be bound to your PATH by default).</li>
		</ol>
	</div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
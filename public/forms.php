<?php
require_once('../.core/core.php');
$pageSettings = array(
	'views' => array(
		'header' => array(
			'pageName' => 'Forms',
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
	<h1>Forms</h1>
	<div class="articleBody clear">
		<p>Forms can be automatically generated from the forms class by creating a Form Object.</p>
		<p>You start by creating the object: $myForm = new Form(); (passing true into the function will generate an actual HTML form element.</p>
		<p>You can then generate a button by using $myForm->button(); (all the configuration for how the button will generate is done by it's input variables below.)</p>
		<p>($type, $name, $value, $class, $onClick, $autofocus, $disabled)</p>
		<p>You can return the rendered form by using $myForm->render(); (you then should append this into your $body variable where needed.)</p>
	</div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
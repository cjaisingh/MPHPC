<?php
require_once('../.core/core.php');
$pageSettings = array(
	'views' => array(
		'header' => array(
			'pageName' => 'Views',
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
	<h1>Views</h1>
	<div class="articleBody clear">
		<p>Views are defined scripts that you can include into your page, these can be dynamic php or static HTML.</p>
		<p>You can allocate a view to a page via it's configuration array, under views, this can simply be a &quot;true&quot; value for a static page, or an array for a dynamic page to pass variables to the view.</p>
		<p>Variables are passed through to a view using the $viewSettings array, based on what you put in the page configuration.</p>
		<p>You can render the views in order by calling $thisPage-&gt;render();</p>
		<p>You can render an individual view programmatically by calling $thisPage-&gt;renderView('header');</p>
		<h2>Header</h2>
		<p>Header is the default view which includes the navigation bar, resource allocation, page details and site details.</p>
		<p>.views/header.php</p>
		<h2>Body</h2>
		<p>Body is a special view that is generated from the $thisPage->body variable, this allows you to dynamically generate the body of a page in it's controller.</p>
		<p>Note that this should only be used for a dynamic input, if you need to render a static html body then it's better to render the individual header and footer around your static html.</p>
		<h2>Footer</h2>
		<p>Footer is the default view that closed off elements from the header, displays the time it took to generate the page (in DEV environment) and the name of the author.</p>
		<p>.views/footer.php</p>
	</div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
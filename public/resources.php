<?php
require_once('../.core/core.php');
$pageSettings = array(
    'views' => array(
        'header' => array(
            'pageName' => 'Resources',
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
    <h1>Resources</h1>

    <div class="articleBody clear">
        <p>Resources are stored under the public/resources folder.</p>

        <p>You can create extra resources in .scss and .js folders, then compile them by manually running
            hooks/post-recieve or by binding the hook.</p>

        <p>You can bind a specific resource to page via it's configuration array, under:</p>

        <p>views =&gt; header =&gt; css</p>

        <p>views =&gt; header =&gt; js</p>

        <p>You can manually place javascript and css files the css and js folders if you do not wish to use sass/js
            compilation.</p>
    </div>
</article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>

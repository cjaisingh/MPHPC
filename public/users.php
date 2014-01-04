<?php
require_once('../.core/core.php');
$pageSettings = array(
    'views' => array(
        'header' => array(
            'pageName' => 'Users',
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
        <h1>Users</h1>

        <div class="articleBody clear">
            <p>Users</p>
        </div>
    </article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
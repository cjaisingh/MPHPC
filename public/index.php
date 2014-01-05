<?php
require_once('../.core/core.php');
$pageSettings = array(
    'views' => array(
        'header' => array(
            'pageName' => 'Home',
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
        <h1>MPHPC</h1>

        <div class="articleBody clear">
            <p>A modern PHP framework core.</p>

            <p>This is my own take on what a modern PHP framework core should be.</p>
        </div>
    </article>

    <article id="article2">
        <h1>Setup</h1>

        <div class="articleBody clear">
            <p>Installation is relatively straight forward, however there is some additional setup required for some
                features.</p>
            <ol role="list">
                <li role="listitem">Update .settings/settings.php with your desired settings.</li>
                <li role="listitem">Update .settings/rewrites.conf, and include this file in your virtual host.</li>
                <li role="listitem">(optional) If you require custom error pages, update .settings/errors.conf, and
                    include this file in your virtual host.
                </li>
                <li role="listitem">(optional) If you require compilation, <a href="hooks">click here</a>.</li>
            </ol>
        </div>
    </article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
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

            <h2>Feature List</h2>
            <ul role="list">
                <li role="listitem">SASS Compilation</li>
                <li role="listitem">JavaScript Compilation</li>
                <li role="listitem">Global Site Settings</li>
                <li role="listitem">Database Class</li>
                <li role="listitem">Forms Class</li>
            </ul>
            <h2>To Do</h2>
            <ul role="list">
                <li role="listitem">Expand forms class to include more input methods</li>
                <li role="listitem">Standard for session variables according to page</li>
                <li role="listitem">Login System</li>
            </ul>
            <p>This is still extremely unfinished.</p>
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
                <li role="listitem">(optional) If you require sass/js compilation, <a href="hooks">click here</a>.</li>
            </ol>
        </div>
    </article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
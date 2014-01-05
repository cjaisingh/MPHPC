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

            <p>You start by creating the object: $myForm = new Form();.</p>

            <p>You can then generate a button by using $myForm->button(); (all the configuration for how the button will
                generate is done by it's input variables.)</p>

            <p>You can return the rendered form by using $myForm->render(); (you then should append this into your $body
                variable where needed.)</p>
            <?php
                $form = new Form();
                $form->button();
                $form->checkbox();
                $form->textInput();
                echo $form->render();
            ?>
            <div class="clear"></div>
            <p>You can also directly call a particular form input by using the corresponding class (Button, Checkbox, TextInput).</p>
            <p>For example: $button = new Button();</p>
            <p>This runs the exact same code as when generating a form, but will not generate a form element and is used for only generating one input.</p>
            <?php
                $button = new Button();
                echo $button->render();
                $checkbox = new Checkbox();
                echo $checkbox->render();
                $textInput = new TextInput();
                echo $textInput->render();
            ?>
        </div>
    </article>
<?php
// Render Footer
$thisPage->renderView('footer');
?>
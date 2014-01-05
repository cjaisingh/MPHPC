<?php

require_once('traits/button.trait.php');

/**
 * Class Button
 */
class Button
{
    private $inputHTML;
    use ButtonTrait;

    /**
     * Button Constructor
     * Call the function to generate a button, pass through options to customize.
     * @param type => ('button', 'submit', 'reset')    ['button']      (Specifies the type of the button)
     * @param name => (true, false)                     [false]         (Specifies a name and id for the button)
     * @param value => (true, false)                     [ucfirst(type)] (Specifies an initial value for the button)
     * @param class => (true, false)                     [false]         (Specifies the class of the button)
     * @param onclick => (true, false)                     [false]         (Specifies the onClick of the button)
     * @param autofocus => (true, false)                     [false]         (Specifies that a button should automatically get focus when the page loads)
     * @param disabled => (true, false)                     [false]         (Specifies that a button should be disabled)
     * @return string or integer
     */
    public function __construct($options = array())
    {
        $this->inputHTML = $this->buttonTrait($options);
        return true;
    }

    /**
     * Button Render
     * Call the function to render the button created by this class
     * @return string
     */
    public function render()
    {
        // Return all the generated html
        return $this->inputHTML;
    }
}
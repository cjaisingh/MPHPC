<?php

require_once('traits/textinput.trait.php');

/**
 * Class TextInput
 */
class TextInput
{
    private $inputHTML;
    use TextInputTrait;

    /**
     * Text Input Constructor
     * Call the function to generate a text input, pass through options to customize.
     * @param createElement => (true, false)        [true]          (Specifies whether to generate the element as part of the form, or return the html)
     * @param required => (true, false)            [false]         (Specifies that an input field must be filled out before submitting the form)
     * @param name => (true, false)        [false]         (Specifies a name and id for the input)
     * @param value => (true, false)        [ucfirst(type)] (Specifies an initial value for the input)
     * @param class => (true, false)        [false]         (Specifies the class of the input)
     * @param onclick => (true, false)        [false]         (Specifies the onClick of the input)
     * @param autofocus => (true, false)        [false]         (Specifies that a input should automatically get focus when the page loads)
     * @param disabled => (true, false)        [false]         (Specifies that a input should be disabled)
     * @param readonly => (true, false)       [false]         (Specifies that an input field is read-only)
     * @param maxlength => (0-999, false)      [false]         (Specifies the maximum number of characters allowed in an <input> element)
     * @param pattern => (regexp, false)     [false]         (Specifies a regular expression that an <input> element's value is checked against)
     * @param spellcheck => (true, false)       [false]         (Specifies whether the element is to have its spelling and grammar checked or not)
     * @return integer
     */
    public function __construct($options = array())
    {
        $this->inputHTML = $this->TextInputTrait($options);
        return true;
    }

    /**
     * Text Input Render
     * Call the function to render the text input created by this class
     * @return string
     */
    public function render()
    {
        // Return all the generated html
        return $this->inputHTML;
    }
}
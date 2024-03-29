<?php

require_once('traits/button.trait.php');
require_once('traits/checkbox.trait.php');
require_once('traits/textinput.trait.php');

/**
 * Class Form
 */
class Form
{
    private $formName;
    private $formStartHTML;
    private $formBodyHTML = '';
    private $formEndHTML;
    use ButtonTrait;
    use CheckBoxTrait;
    use TextInputTrait;

    /**
     * Form Constructor
     * Call the function to generate a form, pass through options to customize.
     * @param name => (true, false)          [false]     (Specifies the name and id attributes of the form element)
     * @param action => (true, false)          [false]     (Specifies where to send the form-data when a form is submitted)
     * @param onsubmit => (true, false)          [false]     (Set the onsubmit attribute of the form element)
     * @param autocomplete => (true, false)          [false]     (Specifies whether a form should have autocomplete on or off)
     * @param novalidate => (true, false)          [false]     (Specifies that the form should not be validated when submitted)
     * @param method => ('get', 'post', false) [false]     (Specifies the HTTP method to use when sending form-data)
     * @param target => ('_blank', '_self', '_parent', '_top', false) [false]
     * @param enctype => ('application/x-www-form-urlencoded', 'multipart/form-data', 'text/plain', false) [false] (Specifies how the form-data should be encoded when submitting it to the server (only for method="post"))
     * @return integer
     */
    public function __construct($options = array())
    {
        // Set default option values
        if (!isset($options['name'])) {
            // If we don't have a form name, create one using a unique id
            $options['name'] = false;
        }
        if (!isset($options['action'])) {
            $options['action'] = false;
        }
        if (!isset($options['onsubmit'])) {
            $options['onsubmit'] = false;
        }
        if (!isset($options['autocomplete'])) {
            $options['autocomplete'] = false;
        }
        if (!isset($options['novalidate'])) {
            $options['novalidate'] = false;
        }
        if (!isset($options['method'])) {
            $options['method'] = false;
        }
        if (!isset($options['target'])) {
            $options['target'] = false;
        }
        if (!isset($options['enctype'])) {
            $options['enctype'] = false;
        }
        if(!isset($options['name'])){
            // Start Creating the form HTML
            $this->formStartHTML = '<form id="' . $options['name'] . '" name="' . $options['name'] . '"';

            // Set the form name
            $this->formName = $options['name'];
        } else {
            // Start Creating the form HTML
            $this->formStartHTML = '<form';
        }


        // Allow setting the action
        if ($options['action'] != false) {
            $this->formStartHTML .= ' action="' . $options['action'] . '"';
        };

        // Allow setting the onSubmit
        if ($options['onsubmit'] != false) {
            $this->formStartHTML .= ' onsubmit="' . $options['onsubmit'] . '"';
        };

        // Allow setting the autocomplete
        if ($options['autocomplete'] != false) {
            $this->formStartHTML .= ' autocomplete="' . $options['autocomplete'] . '"';
        };

        // Allow setting the novalidate
        if ($options['novalidate'] != false) {
            $this->formStartHTML .= ' novalidate="novalidate"';
        };

        // Allow setting the method
        if ($options['method'] != false) {
            $this->formStartHTML .= ' method="' . $options['method'] . '"';
        };

        // Allow setting the target
        if ($options['target'] != false) {
            $this->formStartHTML .= ' method="' . $options['target'] . '"';
        };

        // Allow setting the enctype
        if ($options['enctype'] != false) {
            $this->formStartHTML .= ' enctype="' . $options['enctype'] . '"';
        };

        // Close off the element
        $this->formStartHTML .= '>';

        // Make sure the form gets closed
        $this->formEndHTML = '</form>';
        return true;
    }

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
     * @return integer
     */
    public function button($options = array()){
        $this->formBodyHTML .= $this->ButtonTrait($options);
        return true;
    }

    /**
     * Checkbox Constructor
     * Call the function to generate a checkbox input, pass through options to customize.
     * @param createElement => (true, false)   [true]      (Specifies whether to generate the element as part of the form, or return the html)
     * @param required => (true, false)   [false]     (Specifies that an input field must be filled out before submitting the form)
     * @param name => (true, false)   [false]     (Specifies a name and id for the input)
     * @param checked => (true, false)   [false]     (Specifies whether the checkbox is checked)
     * @param class => (true, false)   [false]     (Specifies the class of the input)
     * @param onclick => (true, false)   [false]     (Specifies the onClick of the input)
     * @param autofocus => (true, false)   [false]     (Specifies that a input should automatically get focus when the page loads)
     * @param disabled => (true, false)   [false]     (Specifies that a input should be disabled)
     * @param readonly => (true, false)   [false]     (Specifies that an input field is read-only)
     * @return integer
     */
    public function checkbox($options = array()){
        $this->formBodyHTML .= $this->checkboxTrait($options);
        return true;
    }

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
    public function textInput($options = array())
    {
        $this->formBodyHTML .= $this->textInputTrait($options);
        return true;
    }
    /**
     * Form Render
     * Call the function to render the form created by this class
     * @return string
     */
    public function render()
    {
        // Return all the generated html
        return $this->formStartHTML . $this->formBodyHTML . $this->formEndHTML;
    }
}
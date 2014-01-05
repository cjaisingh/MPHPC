<?php

require_once('traits/button.trait.php');
require_once('traits/checkbox.trait.php');
require_once('traits/textinput.trait.php');

/**
 * Class Form
 * @todo: Use classes for each input method, forms class should only use those classes to append to the form
 */
class Form
{
    private $formName;
    private $formStartHTML;
    private $formBodyHTML = '';
    private $formEndHTML;
    use Button;
    use Checkbox;
    use TextInput;

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
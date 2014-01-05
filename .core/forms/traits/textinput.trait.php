<?php
trait TextInput {
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
     * @return string or integer
     */
    public function textInput($options = array())
    {
        // Set default option values
        if (!isset($options['name'])) {
            $options['name'] = false;
        }
        if (!isset($options['value'])) {
            $options['value'] = false;
        }
        if (!isset($options['class'])) {
            $options['class'] = false;
        }
        if (!isset($options['onclick'])) {
            $options['onclick'] = false;
        }
        if (!isset($options['disabled'])) {
            $options['disabled'] = false;
        }
        if (!isset($options['autofocus'])) {
            $options['autofocus'] = false;
        }
        if (!isset($options['readonly'])) {
            $options['readonly'] = false;
        }
        if (!isset($options['maxlength'])) {
            $options['maxlength'] = false;
        }
        if (!isset($options['pattern'])) {
            $options['pattern'] = false;
        }
        if (!isset($options['spellcheck'])) {
            $options['spellcheck'] = false;
        }
        // Draw the start of the input
        $tempHTML = '<input type="' . $options['type'] . '"';
        // Allow disabling the button
        if ($options['disabled'] != false) {
            $tempHTML .= ' disabled="disabled"';
        }
        // Allow setting the autofocus
        if ($options['autofocus'] != false) {
            $tempHTML .= ' autofocus="autofocus"';
        }
        // Allow setting the required
        if ($options['required'] != false) {
            $tempHTML .= ' required="required"';
        }
        // Allow setting the readonly
        if ($options['readonly'] != false) {
            $tempHTML .= ' readonly="readonly"';
        }
        // Allow setting the class
        if ($options['class'] != false) {
            $tempHTML .= ' class="' . $options['class'] . '"';
        }
        // Allow setting the on click event
        if ($options['onclick'] != false) {
            $tempHTML .= ' onclick="' . $options['onclick'] . '"';
        }
        // Allow setting the maxlength
        if ($options['maxlength'] != false) {
            $tempHTML .= ' maxlength="' . $options['maxlength'] . '"';
        }
        // Allow setting the pattern
        if ($options['pattern'] != false) {
            $tempHTML .= ' pattern="' . $options['pattern'] . '"';
        }
        // Allow setting the spellcheck
        if ($options['spellcheck'] != false) {
            $tempHTML .= ' spellcheck="true"';
        }
        // Allow setting the name
        if ($options['name'] != false) {
            $tempHTML .= ' name="' . $options['name'] . '" id="' . $options['name'] . '"';
        }
        // Force setting the value
        if ($options['value'] == false) {
            $options['value'] = 'Text';
        }
        // Handle the html
        $this->formBodyHTML .= $tempHTML .= ' value="' . $options['value'] . '">';
        return true;
    }
}
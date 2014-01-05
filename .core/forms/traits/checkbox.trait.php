<?php
trait CheckBoxTrait {
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
     * @return string
     */
    public function checkboxTrait($options = array())
    {
        // Set default option values
        if (!isset($options['name'])) {
            $options['name'] = false;
        }
        if (!isset($options['checked'])) {
            $options['checked'] = false;
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
        // Draw the start of the checkbox
        $tempHTML = '<input type="checkbox"';
        // Allow disabling the button
        if ($options['disabled'] != false) {
            $tempHTML .= ' disabled="disabled"';
        }
        // Allow setting the autofocus
        if ($options['autofocus'] != false) {
            $tempHTML .= ' autofocus="autofocus"';
        }
        // Allow setting the checked
        if ($options['checked'] != false) {
            $tempHTML .= ' checked="checked"';
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
        // Allow setting the name
        if ($options['name'] != false) {
            $tempHTML .= ' name="' . $options['name'] . '" id="' . $options['name'] . '"';
        }
        // Handle the html
        return $tempHTML .= '>';
    }
}
?>
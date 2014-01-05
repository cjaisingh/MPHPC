<?php
trait Button {
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
    public function button($options = array())
    {
        // Set default option values
        if (!isset($options['type'])) {
            $options['type'] = 'button';
        }
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
        if (!isset($options['autofocus'])) {
            $options['autofocus'] = false;
        }
        if (!isset($options['disabled'])) {
            $options['disabled'] = false;
        }
        // Draw the start of the button
        $tempHTML = '<button type="' . $options['type'] . '"';
        // Allow disabling the button
        if ($options['disabled'] != false) {
            $tempHTML .= ' disabled="disabled"';
        }
        // Allow setting the autofocus
        if ($options['autofocus'] != false) {
            $tempHTML .= ' autofocus="autofocus"';
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
        // Force setting the value
        if ($options['value'] == false) {
            $options['value'] = ucfirst($options['type']);
        }
        // Handle the html
        $this->formBodyHTML .= $tempHTML .= '>' . $options['value'] . '</button>';
        return true;
    }
}
?>
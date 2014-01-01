<?php
class Form {
	private $formName;
	private $formStartHTML;
	private $formBodyHTML = '';
	private $formEndHTML;
	
	/*
		Function: Form Constructor
		Usage: Call the function to generate a form, pass through options to customize.
		Options:
			NAME             ACCEPTED VALUES   DEFAULT VALUE   DESCRIPTION
			createForm   => (true, false)          [false]     (Enable creating the form element around your inputs)
			name 	     => (true, false)          [false]     (Specifies the name and id attributes of the form element)
			action       => (true, false)          [false]     (Specifies where to send the form-data when a form is submitted)
			onsubmit     => (true, false)          [false]     (Set the onsubmit attribute of the form element)
			autocomplete => (true, false)          [false]     (Specifies whether a form should have autocomplete on or off)
			novalidate   => (true, false)          [false]     (Specifies that the form should not be validated when submitted)
			method       => ('get', 'post', false) [false]     (Specifies the HTTP method to use when sending form-data)
			target       => ('_blank', '_self', '_parent', '_top', false) [false]
			enctype => ('application/x-www-form-urlencoded', 'multipart/form-data', 'text/plain', false) [false] (Specifies how the form-data should be encoded when submitting it to the server (only for method="post"))
	*/
	public function __construct($options = array()){
		// Set default option values
		if(!isset($options['createForm'])){
			$options['createForm'] = false;
		}
		if(!isset($options['name'])){
			// If we don't have a form name, create one using a unique id
			$options['name'] = uniqid();
		}
		if(!isset($options['action'])){
			$options['action'] = false;
		}
		if(!isset($options['onsubmit'])){
			$options['onsubmit'] = false;
		}
		if(!isset($options['autocomplete'])){
			$options['autocomplete'] = false;
		}
		if(!isset($options['novalidate'])){
			$options['novalidate'] = false;
		}
		if(!isset($options['method'])){
			$options['method'] = false;
		}
		if(!isset($options['target'])){
			$options['target'] = false;
		}
		if(!isset($options['enctype'])){
			$options['enctype'] = false;
		}
		if($options['createForm']){
			// Set the form name
			$this->formName = $options['name'];
			
			// Start Creating the form HTML
			$this->formStartHTML = '<form id="'.$options['name'].'" name="'.$options['name'].'"';
			
			// Allow setting the action
			if($options['action'] != false){
				$this->formStartHTML .= ' action="'.$options['action'].'"';	
			};

			// Allow setting the onSubmit
			if($options['onsubmit'] != false){
				$this->formStartHTML .= ' onsubmit="'.$options['onsubmit'].'"';	
			};
			
			// Allow setting the autocomplete
			if($options['autocomplete'] != false){
				$this->formStartHTML .= ' autocomplete="'.$options['autocomplete'].'"';	
			};
			
			// Allow setting the novalidate
			if($options['novalidate'] != false){
				$this->formStartHTML .= ' novalidate="novalidate"';	
			};
			
			// Allow setting the method
			if($options['method'] != false){
				$this->formStartHTML .= ' method="'.$options['method'].'"';	
			};
			
			// Allow setting the target
			if($options['target'] != false){
				$this->formStartHTML .= ' method="'.$options['target'].'"';	
			};
			
			// Allow setting the enctype
			if($options['enctype'] != false){
				$this->formStartHTML .= ' enctype="'.$options['enctype'].'"';	
			};
			
			// Close off the element
			$this->formStartHTML .= '>';
			
			// Make sure the form gets closed
			$this->formEndHTML = '</form>';
		}
	}
	
	/*
		Function: Form Render
		Usage: Call the function to render the form created by this class	
	*/
	public function render(){
		// Return all the generated html
		return $this->formStartHTML.$this->formBodyHTML.$this->formEndHTML;	
	}
	/*
		Function: Button Constructor
		Usage: Call the function to generate a button, pass through options to customize.
		Options:
			NAME               ACCEPTED VALUES                 DEFAULT VALUE   DESCRIPTION
			createElement  => (true, false)					   [true]          (Specifies whether to generate the element as part of the form, or return the html)
			type           => ('button', 'submit', 'reset')    ['button']      (Specifies the type of the button)
			name 	       => (true, false) 		           [false]         (Specifies a name and id for the button)
			value          => (true, false) 		           [ucfirst(type)] (Specifies an initial value for the button)
			class          => (true, false) 		           [false]         (Specifies the class of the button)
			onclick        => (true, false) 		           [false]         (Specifies the onClick of the button)
			autofocus      => (true, false) 		           [false]         (Specifies that a button should automatically get focus when the page loads)
			disabled       => (true, false) 		           [false]         (Specifies that a button should be disabled)
			formaction     => (URL, false) 		               [false]         (Specifies where to send the form-data when a form is submitted. Only for type='submit')
			formmethod     => ('get','post', false) 		   [false]         (Specifies how to send the form-data (which HTTP method to use). Only for type="submit")
			formnovalidate => (true, false) 		           [false]         (Specifies that the form-data should not be validated on submission. Only for type="submit")
			formtarget     => ('_blank', '_self', '_parent', '_top', framename, false) [false] (Specifies where to display the response after submitting the form. Only for type="submit")
			formenctype => ('application/x-www-form-urlencoded', 'multipart/form-data', 'text/plain', false) [false] (Specifies how form-data should be encoded before sending it to a server. Only for type="submit")
	*/
	public function button($options = array()){
		// Set default option values
		if(!isset($options['type'])){
			$options['type'] = 'button';
		}
		if(!isset($options['createElement'])){
			$options['createElement'] = true;
		}
		if(!isset($options['name'])){
			$options['name'] = false;
		}
		if(!isset($options['value'])){
			$options['value'] = false;
		}
		if(!isset($options['class'])){
			$options['class'] = false;
		}
		if(!isset($options['onclick'])){
			$options['onclick'] = false;
		}
		if(!isset($options['autofocus'])){
			$options['autofocus'] = false;
		}
		if(!isset($options['disabled'])){
			$options['disabled'] = false;
		}
		if(!isset($options['formaction'])){
			$options['formaction'] = false;
		}
		if(!isset($options['formmethod'])){
			$options['formmethod'] = false;
		}
		if(!isset($options['formnovalidate'])){
			$options['formnovalidate'] = false;
		}
		if(!isset($options['formtarget'])){
			$options['formtarget'] = false;
		}
		if(!isset($options['formenctype'])){
			$options['formenctype'] = false;
		}
		// Draw the start of the button
		$tempHTML = '<button type="'.$options['type'].'"';
		// Allow disabling the button
		if($options['disabled'] != false){
			$tempHTML .= ' disabled="disabled"';
		}
		// Allow setting the autofocus
		if($options['autofocus'] != false){
			$tempHTML .= ' autofocus="autofocus"';
		}
		// Allow setting the class
		if($options['class'] != false){
			$tempHTML .= ' class="'.$options['class'].'"';
		}
		// Allow setting the on click event
		if($options['onclick'] != false){
			$tempHTML .= ' onclick="'.$options['onclick'].'"';
		}
		// Allow setting the name
		if($options['name'] != false){
			$tempHTML .= ' name="'.$options['name'].'" id="'.$options['name'].'"';
		}
		// Allow setting the formaction
		if($options['formaction'] != false){
			$tempHTML .= ' formaction="'.$options['formaction'].'"';
		}
		// Allow setting the formmethod
		if($options['formmethod'] != false){
			$tempHTML .= ' formmethod="'.$options['formmethod'].'"';
		}
		// Allow setting the formnovalidate
		if($options['formnovalidate'] != false){
			$tempHTML .= ' formnovalidate="'.$options['formnovalidate'].'"';
		}
		// Allow setting the formtarget
		if($options['formtarget'] != false){
			$tempHTML .= ' formtarget="'.$options['formtarget'].'"';
		}
		// Allow setting the formenctype
		if($options['formenctype'] != false){
			$tempHTML .= ' formenctype="'.$options['formenctype'].'"';
		}
		// Force setting the value
		if($options['value'] == false){
			$options['value'] = ucfirst($options['type']);	
		}
		// Handle the html
		if($options['createElement'] != false){
			$this->formBodyHTML = $tempHTML .= ' form="'.$this->formName.'">'.$options['value'].'</button>';
		} else {
			return $tempHTML .= ' form="'.$this->formName.'">'.$options['value'].'</button>';
		}
		unset($tempHTML);
	}
	/*
		Function: Text Input Constructor
		Usage: Call the function to generate a text input, pass through options to customize.
		Options:
			NAME               ACCEPTED VALUES                 DEFAULT VALUE   DESCRIPTION
			createElement  => (true, false)					   [true]          (Specifies whether to generate the element as part of the form, or return the html)
			required	   => (true, false)	                   [false]         (Specifies that an input field must be filled out before submitting the form)
			name 	       => (true, false) 		           [false]         (Specifies a name and id for the input)
			value          => (true, false) 		           [ucfirst(type)] (Specifies an initial value for the input)
			class          => (true, false) 		           [false]         (Specifies the class of the input)
			onclick        => (true, false) 		           [false]         (Specifies the onClick of the input)
			autofocus      => (true, false) 		           [false]         (Specifies that a input should automatically get focus when the page loads)
			disabled       => (true, false) 		           [false]         (Specifies that a input should be disabled)
			readonly       => (true, false)                    [false]         (Specifies that an input field is read-only)
			maxlength      => (0-999, false)                   [false]         (Specifies the maximum number of characters allowed in an <input> element)
			pattern        => (regexp, false)                  [false]         (Specifies a regular expression that an <input> element's value is checked against)
	*/
	public function textInput($options = array()){
		// Set default option values
		if(!isset($options['createElement'])){
			$options['createElement'] = true;
		}
		if(!isset($options['name'])){
			$options['name'] = false;
		}
		if(!isset($options['value'])){
			$options['value'] = false;
		}
		if(!isset($options['class'])){
			$options['class'] = false;
		}
		if(!isset($options['onclick'])){
			$options['onclick'] = false;
		}
		if(!isset($options['disabled'])){
			$options['disabled'] = false;
		}
		if(!isset($options['autofocus'])){
			$options['autofocus'] = false;
		}
		if(!isset($options['readonly'])){
			$options['readonly'] = false;
		}
		if(!isset($options['maxlength'])){
			$options['maxlength'] = false;
		}
		if(!isset($options['pattern'])){
			$options['pattern'] = false;
		}
		// Draw the start of the input
		$tempHTML = '<input type="'.$options['type'].'"';
		// Allow disabling the button
		if($options['disabled'] != false){
			$tempHTML .= ' disabled="disabled"';
		}
		// Allow setting the autofocus
		if($options['autofocus'] != false){
			$tempHTML .= ' autofocus="autofocus"';
		}
		// Allow setting the required
		if($options['required'] != false){
			$tempHTML .= ' required="required"';
		}
		// Allow setting the readonly
		if($options['readonly'] != false){
			$tempHTML .= ' readonly="readonly"';
		}
		// Allow setting the class
		if($options['class'] != false){
			$tempHTML .= ' class="'.$options['class'].'"';
		}
		// Allow setting the on click event
		if($options['onclick'] != false){
			$tempHTML .= ' onclick="'.$options['onclick'].'"';
		}
		// Allow setting the maxlength
		if($options['maxlength'] != false){
			$tempHTML .= ' maxlength="'.$options['maxlength'].'"';
		}
		// Allow setting the pattern
		if($options['pattern'] != false){
			$tempHTML .= ' pattern="'.$options['pattern'].'"';
		}
		// Allow setting the name
		if($options['name'] != false){
			$tempHTML .= ' name="'.$options['name'].'" id="'.$options['name'].'"';
		}
		// Force setting the value
		if($options['value'] == false){
			$options['value'] = 'Text';
		}
		// Handle the html
		if($options['createElement'] != false){
			$this->formBodyHTML = $tempHTML .= ' form="'.$this->formName.'" value="'.$options['value'].'">';
		} else {
			return $tempHTML .= ' form="'.$this->formName.'" value="'.$options['value'].'">';
		}
		unset($tempHTML);
	}
};

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
			NAME          ACCEPTED VALUES   DEFAULT VALUE   DESCRIPTION
			createForm => (true, false)     [false]         (Enable creating the form element around your inputs)
			name 	   => (true, false)     [false]         (Set the name and id attributes of the form element)
			action     => (true, false)     [false]         (Set the action attribute of the form element)
			onSubmit   => (true, false)     [false]         (Set the onsubmit attribute of the form element)
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
		if(!isset($options['onSubmit'])){
			$options['onSubmit'] = false;
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
			if($options['onSubmit'] != false){
				$this->formStartHTML .= ' onsubmit="'.$options['onSubmit'].'"';	
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
			NAME          ACCEPTED VALUES     DEFAULT VALUE   DESCRIPTION
			type      => ('button', 'submit') ['button']      (Set the type attribute of the button element)
			name 	  => (true, false) 		  [false]         (Set the name and id attributes of the button element)
			value     => (true, false) 		  [ucfirst(type)] (Set the value attribute of the button element)
			class     => (true, false) 		  [false]         (Set the class attribute of the button element)
			onClick   => (true, false) 		  [false]         (Set the onClick attribute of the button element)
			autofocus => (true, false) 		  [false]         (Set the autofocus attribute of the button element)
			disabled  => (true, false) 		  [false]         (Set the disabled attribute of the button element)
			
	*/
	public function button($options = array()){
		// Set default option values
		if(!isset($options['type'])){
			$options['type'] = 'button';
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
		if(!isset($options['onClick'])){
			$options['onClick'] = false;
		}
		if(!isset($options['autofocus'])){
			$options['autofocus'] = false;
		}
		if(!isset($options['disabled'])){
			$options['disabled'] = false;
		}
		// Draw the start of the button
		$this->formBodyHTML .= '<button type="'.$options['type'].'"';
		// Allow disabling the button
		if($options['disabled'] != false){
			$this->formBodyHTML .= ' disabled="disabled"';
		}
		// Allow setting the class
		if($options['class'] != false){
			$this->formBodyHTML .= ' class="'.$options['class'].'"';
		}
		// Allow setting the on click event
		if($options['onClick'] != false){
			$this->formBodyHTML .= ' onclick="'.$options['onClick'].'"';
		}
		// Allow setting the name
		if($options['name'] != false){
			$this->formBodyHTML .= ' name="'.$options['name'].'" id="'.$options['name'].'"';
		}
		// Allow setting the autofocus
		if($options['autofocus'] != false){
			$this->formBodyHTML .= ' autofocus="autofocus"';
		}
		// Force setting the value
		if($options['value'] == false){
			$options['value'] = ucfirst($options['type']);	
		}
		$this->formBodyHTML .= '>'.$options['value'].'</button>';
	}
};

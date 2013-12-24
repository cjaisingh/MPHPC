<?php
class Form {
	private $formName;
	private $formStartHTML;
	private $formBodyHTML = '';
	private $formEndHTML;
	
	public function __construct($createForm = false, $name = false, $action = '#', $onSubmit = false){
		if($createForm){
			// If we don't have a form name, create one using a unique id
			if($name == false){
				$name = uniqid();	
			}
			// Set the form name
			$this->formName = $name;
			
			// Start Creating the form HTML
			$this->formStartHTML = '<form id="'.$name.'" name="'.$name.'" action="'.$action.'"';
			// Allow setting the onSubmit
			if($onSubmit != false){
				$this->formStartHTML .= ' onsubmit="'.$onSubmit.'"';	
			};
			
			// Close off the element
			$this->formStartHTML .= '>';
			
			// Make sure the form gets closed
			$this->formEndHTML = '</form>';
		}
	}
	
	public function render(){
		// Return all the generated html
		return $this->formStartHTML.$this->formBodyHTML.$this->formEndHTML;	
	}
	
	public function button($type = 'button', $name = false, $value = false, $class = false, $onClick = false, $autofocus = false, $disabled = false){
		// Draw the start of the button
		$this->formBodyHTML .= '<button type="'.$type.'"';
		// Allow disabling the button
		if($disabled != false){
			$this->formBodyHTML .= ' disabled="disabled"';
		}
		// Allow setting the class
		if($class != false){
			$this->formBodyHTML .= ' class="'.$class.'"';
		}
		// Allow setting the on click event
		if($onClick != false){
			$this->formBodyHTML .= ' onclick="'.$onClick.'"';
		}
		// Allow setting the name
		if($name != false){
			$this->formBodyHTML .= ' name="'.$name.'" id="'.$name.'"';
		}
		// Allow setting the autofocus
		if($autofocus != false){
			$this->formBodyHTML .= ' autofocus="autofocus"';
		}
		// Force setting the value
		if($value == false){
			$value = ucfirst($type);	
		}
		$this->formBodyHTML .= '>'.$value.'</button>';
	}
	
	
};

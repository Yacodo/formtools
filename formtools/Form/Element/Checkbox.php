<?php

namespace formtools\Form\Element;

class Checkbox extends Input {
	
	/**
	 * @see formtools\Form\Element
	**/
	public function setValue($value){

		$this->_value = \filter_var($value, FILTER_VALIDATE_BOOLEAN);
		return $this;

	}

	public function generateElement(){
		
		$attribs = array('type' => 'checkbox');

		if($this->_value === true){

			$attribs['checked'] = 'checked';

		}

		return $this->generateInput($attribs);
		
	}
	
}

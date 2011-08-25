<?php

namespace formtools\Form\Element;

class Select extends Options {
	
	function generateElement(){

		$return = '<select'.$this->generateAttribs().'>';
		$escape = new \formtools\Filter\Escape();

		foreach($this->_options AS $value => $label){

			$return.= '<option value="'. $escape($value) .'"';
			$return.= ($value == $this->_value) ?' selected' : '';
			$return.= '>'.$label.'</option>';

		}

		$return.= '</select>';
		
		return $return;
		
	}
	
}

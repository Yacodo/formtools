<?php

namespace formtools\Form\Element;

class Textarea extends \formtools\Form\Element {

	function generateElement(){

		$escape = new \formtools\Filter\Escape();

		$return = '<textarea'.$this->generateAttribs().'>';

			$return.= $escape($this->_value);

		$return.= '</textarea>';

		return $return;
		
	}
	
}

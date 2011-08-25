<?php

namespace formtools\Form\Element;

class Text extends Input {

	public function generateElement(){
		
		return $this->generateInput(array('type' => 'text', 'value' => $this->_value));
		
	}

}

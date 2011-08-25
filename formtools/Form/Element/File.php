<?php

namespace formtools\Form\Element;

class File extends Input {
	
	public function generateElement(){
		
		return $this->generateInput(array('type' => 'file'));
		
	}
	
}

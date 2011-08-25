<?php

namespace formtools\Form\Element;

class Hidden extends Input {

	public function generateElement(){

		return $this->generateInput(array('type' => 'hidden', 'value' => $this->_value));

	}

	public function decorators(){

		$this->setPosition('element');
		$this->setDecorators('<tr style="display:none;">', '</tr>');
		$this->setElementDecorators('<td colspan="2">', '</td>');

	}

}

<?php

namespace formtools\Form\Element;

abstract class Push extends Input {

	public function generateInput(array $add){

		$add['value'] = $this->_value;
		return parent::generateInput($add);

	}

	public function decorators(){

		parent::decorators();
		$this->setPosition('element');//Only show the element
		$this->setElementDecorators('<td></td><td>', '</td>'); //add the col for the label, avoid broken <table/>

	}

}

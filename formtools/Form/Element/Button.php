<?php

namespace formtools\Form\Element;

class Button extends Push {

	public function generateElement(){

		return $this->generateInput(array('type' => 'button'));

	}

}

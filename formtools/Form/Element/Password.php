<?php

namespace formtools\Form\Element;

class Password extends Input {

	public function generateElement(){

		return $this->generateInput(array('type' => 'password'));

	}

}

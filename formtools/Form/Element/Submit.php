<?php

namespace formtools\Form\Element;

class Submit extends Push {

	public function generateElement(){

		return $this->generateInput(array('type' => 'submit'));

	}

}

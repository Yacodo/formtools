<?php

namespace formtools\Form\Element;

class Reset extends Push {

	function  generateElement() {

		return $this->generateInput(array('type' => 'reset'));

	}

}

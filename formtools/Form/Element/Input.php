<?php

namespace formtools\Form\Element;

abstract class Input extends \formtools\Form\Element {

	protected function generateInput(array $add){

		return '<input'.$this->generateAttribs($add).'/>';

	}

}

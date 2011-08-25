<?php

namespace examples\Form;
use \formtools;
use \formtools\Form\Element;

class Template extends formtools\Form {

	public function configure(){

		$this->setGeneration(__DIR__ . '/../template.txt');

		$text = new Element\Text('text', 'Element Label :');
		$text->addValidator('int')->setValue('I\'m a string.');

		$submit = new Element\Submit('submit');
		$submit->setValue('Done');

		$this->addElements(array($text, $submit));

	}

}

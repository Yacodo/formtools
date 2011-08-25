<?php

namespace examples\Form;
use \formtools\Form\Element;

class All extends \formtools\Form {

	public function configure(){

		$button = new Element\Button('button');
		$button->setValue('Element\Button');
		$checkbox = new Element\Checkbox('checkbox', 'Element\Checkbox :');
		$file = new Element\File('file', 'Element\File :');
		$hidden = new Element\Hidden('hidden');
		$image = new Element\Image('image');
		$image->setImage('?=PHPE9568F34-D428-11d2-A769-00AA001ACF42');
		$password = new Element\Password('password', 'Element\Password :');
		$radio = new Element\Radio('radio', 'Element\Radio :');
		$radio->addOptions(array('universe' => 'Hello Universe!', 'world' => 'Hello World!'));
		$reset = new Element\Reset('reset');
		$reset->setValue('Element\Reset');
		$select = new Element\Select('select', 'Element\Select :');
		$select->addOptions(array('light' => 'I\'m a Jedi.', 'sith' => 'I\'m a Sith.'));
		$submit = new Element\Submit('submit');
		$submit->setValue('Element\Submit');
		$textarea = new Element\Textarea('textarea', 'Element\Textarea :');
		$textarea->addAttribs(array('rows' => 8, 'cols' => 45));
		$text = new Element\Text('text', 'Element\Text :');

		$this->addElements(array($button, $checkbox, $file, $hidden, $image, $password, $radio, $reset, $select, $submit, $textarea, $text));

	}

}

<?php

namespace examples\Form;
use \formtools;
use \formtools\Form\Element;

class Filter extends formtools\Form {

	public function configure(){

		$alnum = new Element\Text('alnum', 'Filter alnum :');
		$alnum->addFilter('alnum')->setValue('"." is not alnum.');

		$alpha = new Element\Text('alpha', 'Filter alpha :');
		$alpha->addFilter('alpha')->setValue('"0123456789" is not alpha');

		$bool = new Element\Checkbox('bool', 'Check me :');
		$bool->addFilter('bool');

		$email = new Element\Text('email', 'Filter email :');
		$email->addFilter('email')->setValue('emailwith@space .tld');
		
		$escape = new Element\Text('escape', 'Filter escape :');
		$escape->addFilter('escape')->setValue('<àéè&>');

		$float = new Element\Text('float', 'Filter float :');
		$float->addFilter('float')->setValue('42.42');

		$html = new Element\Text('html', 'Filter html :');
		$html->addFilter('html')->setValue('<àéè&>');

		$int = new Element\Text('int', 'Filter int :');
		$int->addFilter('int')->setValue('1337');

		$lower = new Element\Text('lower', 'Filter lower :');
		$lower->addFilter('lower')->setValue('I WANT TO KILL EVERYBODY IN THE WORLD!');

		$replace = new Element\Text('replace', 'Filter replace :');
		$replace->addFilter('replace', array('/Python/', 'PHP'))->setValue('Python API is truly incoherent.');
		
		$trim = new Element\Text('trim', 'Filter trim :');
		$trim->addFilter('trim')->setValue('  I\'m drunk    ..   ');

		$upper = new Element\Text('upper', 'Filter upper :');
		$upper->addFilter('upper')->setValue('call 911 now!');
		
		$url = new Element\Text('url', 'Filter url :');
		$url->addFilter('url')->setValue('http://drunk éàpeople.com/');

		$submit = new Element\Submit('submit');
		$submit->setValue('Click me, if you can');

		$this->addElements(
			array(
				$alnum,
				$alpha,
				$bool,
				$email,
				$escape,
				$float,
				$html,
				$int,
				$lower,
				$replace,
				$trim,
				$upper,
				$url,
				$submit
			)
		);
	}

}

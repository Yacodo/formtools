<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Alnum extends atoum\test {

	public function testWhiteSpace(){

		$validator = new Validate\Alnum();

		$this->assert->boolean($validator->isValid('This is a alnum sentence 0123456789 with space'))->isTrue();
		$this->assert->string($validator->isValid('Not a good sentence for alnum validator.'))
			->isEqualTo('"Not a good sentence for alnum validator." must contains only digits and alphabetic characters.');

	}

	public function testNoWhiteSpace(){

		$validator = new Validate\Alnum(false);

		$this->assert->boolean($validator->isValid('ThisIsAAlnumSentence0123456789WitNoSpace'))->isTrue();
		$this->assert->string($validator->isValid('Bad sentence with space'))
			->isEqualTo('"Bad sentence with space" must contains only digits and alphabetic characters.');

	}

	public function testNewMessage(){

		$validator = new Validate\Alnum();
		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid('.'))->isEqualTo('BAD');
	
	}

}

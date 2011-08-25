<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Alpha extends atoum\test {

	public function testWhiteSpace(){

		$validator = new Validate\Alpha();

		$this->assert->boolean($validator->isValid('This is a Alpha sentence with space'))->isTrue();
		$this->assert->string($validator->isValid('Not a good sentence for Alpha validator.'))
			->isEqualTo('"Not a good sentence for Alpha validator." must contains only alphabetic characters.');

	}

	public function testNoWhiteSpace(){

		$validator = new Validate\Alpha(false);

		$this->assert->boolean($validator->isValid('ThisIsAAlphaSentenceWitNoSpace'))->isTrue();
		$this->assert->string($validator->isValid('Bad sentence with space0'))
			->isEqualTo('"Bad sentence with space0" must contains only alphabetic characters.');

	}

	public function testNewMessage(){

		$validator = new Validate\Alpha();
		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid('1'))->isEqualTo('BAD');
	
	}

}

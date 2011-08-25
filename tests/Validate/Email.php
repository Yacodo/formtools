<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Email extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Email();

		$this->assert->boolean($validator->isValid('yacodoo@gmail.com'))->isTrue();
		$this->assert->string($validator->isValid('yacodoo[at]gmail[dot]com'))->isEqualTo('Invalid email adress.');
		
		$validator->setMessage($message = 'Not an email');

		$this->assert->string($validator->isValid('yacodoo[at]gmail[dot]com'))->isEqualTo($message);

	}

}

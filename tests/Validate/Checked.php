<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Checked extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Checked();

		$this->assert->boolean($validator->isValid(true))->isTrue()
			->setWith($validator->isValid('on'))->isTrue()
			->setWith($validator->isValid(1))->isTrue();

		$this->assert->string($validator->isValid(false))->isEqualTo($message = 'Must be checked.')
			->setWith($validator->isValid('off'))->isEqualTo($message)
			->setWith($validator->isValid(0))->isEqualTo($message);
		
		$validator->setMessage($message = 'Check it');

		$this->assert->string($validator->isValid(false))->isEqualTo($message)
			->setWith($validator->isValid('off'))->isEqualTo($message)
			->setWith($validator->isValid(0))->isEqualTo($message);

	}

}

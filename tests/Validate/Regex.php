<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Regex extends atoum\test {

	public function testValidate(){

		$validator = new Validate\Regex('/^[a-z ,!]+$/');

		$this->assert->boolean($validator->isValid('hello, world!'))->isTrue()
			->setWith($validator->isValid('hi, mom!'))->isTrue();

		$this->assert->string($validator->isValid('.'))->isEqualTo('"." is not an expected value.');

		$validator->setMessage('BAD');
		
		$this->assert->string($validator->isValid('.'))->isEqualTo('BAD');

	}

}

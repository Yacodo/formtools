<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Int extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Int();

		$this->assert->boolean($validator->isValid(1337))->isTrue();

		$this->assert->string($validator->isValid('a'))->isEqualTo('"a" must be an integer.');

		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid('a'))->isEqualTo('BAD');

	}

}

<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Float extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Float();

		$this->assert->boolean($validator->isValid(13.37))->isTrue();

		$this->assert->string($validator->isValid('a'))->isEqualTo('"a" must be a float value.');

		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid('a'))->isEqualTo('BAD');

	}

}

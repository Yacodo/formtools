<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Inarray extends atoum\test {

	public function testValidator(){

		$validator = new Validate\InArray(array('hello', 'world'));

		$this->assert->boolean($validator->isValid('hello'))->isTrue()
			->setWith($validator->isValid('world'))->isTrue();

		$this->assert->string($validator->isValid('universe'))->isEqualTo('"universe" is not in the list of accepted value.');

		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid('universe'))->isEqualTo('BAD');

	}

}

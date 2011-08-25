<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Greater extends atoum\test{

	public function testValidator(){

		$validator = new Validate\Greater(42);

		$this->assert->boolean($validator->isValid(42));

		$validatorStrict = new Validate\Greater(42, true);

		$this->assert->boolean($validatorStrict->isValid(43));

		$this->assert->string($validator->isValid(41))->isEqualTo('"41" must be greater than "42".')
			->setWith($validatorStrict->isValid(42))->isEqualTo('"42" must be strictly greater than "42".');

		$validator->setMessage('BAD');
		$validatorStrict->setMessage('BAD', $validatorStrict::STRICT);

		$this->assert->string($validator->isValid(41))->isEqualTo('BAD')
			->setWith($validatorStrict->isValid(42))->isEqualTo('BAD');

	}

}

<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Less extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Less(42);

		$this->assert->boolean($validator->isValid(42));

		$validatorStrict = new Validate\Less(42, true);

		$this->assert->boolean($validatorStrict->isValid(41));

		$this->assert->string($validator->isValid(43))->isEqualTo('"43" must be lower than "42".')
			->setWith($validatorStrict->isValid(42))->isEqualTo('"42" must be strictly lower than "42".');

		$validator->setMessage('BAD');
		$validatorStrict->setMessage('BAD', $validatorStrict::STRICT);

		$this->assert->string($validator->isValid(43))->isEqualTo('BAD')
			->setWith($validatorStrict->isValid(42))->isEqualTo('BAD');

	}

}

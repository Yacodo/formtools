<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Between extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Between(0, 42);
		$this->assert->boolean($validator->isValid(\mt_rand(0, 42)))->isTrue()
			->setWith($validator->isValid(0))->isTrue()
			->setWith($validator->isValid(42))->isTrue();

		$this->assert->string($validator->isValid(1337))->isEqualTo('"1337" must be between "0" and "42".');
		
		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid(1337))->isEqualTo('BAD');

		$validator = new Validate\Between(0, 42, true);
		$this->assert->boolean($validator->isValid(\mt_rand(1, 41)))->isTrue()
			->setWith($validator->isValid(1))->isTrue()
			->setWith($validator->isValid(41))->isTrue();

		$this->assert->string($validator->isValid(0))->isEqualTo('"0" must be strictly between "0" and "42".');
		$this->assert->string($validator->isValid(42))->isEqualTo('"42" must be strictly between "0" and "42".');

		$validator->setMessage('BAD', $validator::STRICT);

		$this->assert->string($validator->isValid(0))->isEqualTo('BAD');
		$this->assert->string($validator->isValid(42))->isEqualTo('BAD');

	}

}

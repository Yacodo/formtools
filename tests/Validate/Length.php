<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Length extends atoum\test {

	public function testValidate(){

		$validatorHW = new Validate\Length(0, 11);
		$validatorAll = new Validate\Length(5, 12);

		$this->assert->boolean($validatorHW->isValid('hello world'))->isTrue()
			->setWith($validatorAll->isValid($all = 'hello world!'))->isTrue()
			->setWith($validatorHW->isValid(''))->isTrue();

		$this->assert->string($validatorHW->isValid($all))->isEqualTo('"'.$all.'" is more than 11 characters long.')
			->setWith($validatorAll->isValid('hello, universe!'))->isEqualTo('"hello, universe!" is more than 12 characters long.')
			->setWith($validatorAll->isValid('php'))->isEqualTo('"php" is less than 5 characters long.')
			->setWith($validatorAll->isValid(true))->isEqualTo('Type of value not expected.');

		$validatorHW->setMessage('BAD', $validatorHW::MORE);
		$validatorAll->setMessage('BAD', $validatorAll::LESS);

		$this->assert->string($validatorHW->isValid($all))->isEqualTo('BAD')
			->setWith($validatorAll->isValid('php'))->isEqualTo('BAD');

	}

}

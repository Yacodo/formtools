<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Ip extends atoum\test {

	public function testValidator(){

		$validator = new Validate\Ip();

		$this->assert->boolean($validator->isValid('192.168.0.1'))->isTrue()
			->setWith($validator->isValid('::1'))->isTrue();

		$this->assert->string($validator->isValid('localhost'))->isEqualTo('"localhost" must be an IP.');

		$validator->setMessage('BAD');

		$this->assert->string($validator->isValid('localhost'))->isEqualTo('BAD');

	}

}

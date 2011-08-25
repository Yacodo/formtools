<?php

namespace formtools\Validate\tests\units;
use \formtools\Validate;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Base extends atoum\test {

	public function testClass(){

		$this->assert->phpClass('formtools\Validate\Base')
			->isAbstract()
			->hasMethod('isValid')
			->hasMethod('__invoke')
			->hasMethod('setMessage')
			->hasMethod('_error');

	}

}

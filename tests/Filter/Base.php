<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Base extends atoum\test {

	public function testClass(){

		$this->assert->phpClass('formtools\Filter\Base')
			->hasMethod('filter')
			->hasMethod('__invoke');

	}

}

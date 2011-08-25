<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Lower extends atoum\test {

	public function testFilter(){

		$filter = new Filter\Lower();

		$this->assert->string($filter->filter($string = 'Hello W0rld!'))->isEqualTo(\strtolower($string));

	}

}

<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Upper extends atoum\test {

	public function testFilter(){

		$filter = new Filter\Upper();

		$this->assert->string($filter->filter($string = 'Hello W0rld!'))->isEqualTo(\strtoupper($string));

	}

}

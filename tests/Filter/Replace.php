<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Replace extends atoum\test {

	public function testFilter(){

		$filter = new Filter\Replace('/World/', 'Universe');

		$this->assert->string($filter->filter('Hello World!'))->isEqualTo('Hello Universe!');

	}

}

<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Int extends atoum\test {

	public function testFilter(){

		$filter = new Filter\int();

		$this->assert->integer($filter->filter(0))->isIdenticalTo((int) 0)
			->setWith($filter->filter(false))->isIdenticalTo((int) false)
			->setWith($filter->filter(true))->isIdenticalTo((int) true)
			->setWith($filter->filter(null))->isIdenticalTo((int) null);

		$this->assert->when(function(){ (int) new \stdClass(); })->error()->exists();

	}

}

<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Float extends atoum\test {

	public function testFilter(){

		$filter = new Filter\Float();

		$this->assert->float($filter->filter(0))->isIdenticalTo((float) 0)
			->setWith($filter->filter(false))->isIdenticalTo((float) false)
			->setWith($filter->filter(true))->isIdenticalTo((float) true)
			->setWith($filter->filter(null))->isIdenticalTo((float) null);

		$this->assert->when(function(){ (float) new \stdClass(); })->error()->exists();

	}

}

<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Bool extends atoum\test {

	public function testTrue(){

		$filter = new Filter\Bool();
		
		$this->assert->boolean($filter->filter(1))->isTrue()
			->setWith($filter->filter('azerty'))->isTrue()
			->setWith($filter->filter(true))->isTrue()
			->setWith($filter->filter(array('hello')))->isTrue();

	}

	public function testFalse(){

		$filter = new Filter\Bool();

		$this->assert->boolean($filter->filter(0))->isFalse()
			->setWith($filter->filter(''))->isFalse()
			->setWith($filter->filter(false))->isFalse()
			->setWith($filter->filter(array()))->isFalse();

	}

}

<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Email extends atoum\test {
	
	public function testFilter(){

		$filter = new Filter\Email();

		//filter_var is a good function, but need to change filter for simple and advanced email syntax...
		$this->assert->string($filter->filter('yacodoo@gmail. com'))->isEqualTo('yacodoo@gmail.com');

	}

}

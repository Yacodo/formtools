<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Alpha extends atoum\test {

	public function testWhite(){

		$filter = new Filter\Alpha();
		$value = $filter->filter('Hello, W0rld !');
		
		$this->assert->string($value)->isEqualTo('Hello Wrld ');

		$value = $filter->filter(null);

		$this->assert->variable($value)->isNotNull()->isIdenticalTo('');

		$value = $filter->filter(' %@&*+-/!');
		
		$this->assert->string($value)->isNotNull()->isIdenticalTo(' ');

	}

	public function testOnlyAlnum(){

		$filter = new Filter\Alpha(false);
		$value = $filter->filter('Hello, W0rld !');

		$this->assert->string($value)->isEqualTo('HelloWrld');

		$value = $filter->filter(null);

		$this->assert->variable($value)->isNotNull()->isIdenticalTo('');

		$value = $filter->filter(' %@&*+-/!');

		$this->assert->variable($value)->isNotNull()->isIdenticalTo('');

	}

}

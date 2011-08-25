<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Trim extends atoum\test {

	public function testTrim(){

		$filter = new Filter\Trim();

		$this->assert->string($filter->filter($string = "\n\t(Hello World!) "))->isEqualTo('(Hello World!)');

		$filter = new Filter\Trim('!()');

		$this->assert->string($filter->filter($string))->isEqualTo('Hello World');

		$filter = new Filter\Trim('!', false);

		$this->assert->string($filter->filter($string))->isEqualTo($string);

		$filter = new Filter\Trim('TRIM', '!()');

		$this->assert->string($filter->filter($string))->isEqualTo('Hello World');

		$filter = new Filter\Trim('TRIM', '!() ', false);

		$this->assert->string($filter->filter($string))->isEqualTo(\substr($string, 0, -3));

	}

	public function testLeftTrim(){

		$filter = new Filter\Trim('ltrim');

		$this->assert->string($filter->filter($string = "\n\t(Hello World!) "))->isEqualTo('(Hello World!) ');

		$filter = new Filter\Trim('ltrim', '!()');

		$this->assert->string($filter->filter($string))->isEqualTo('Hello World!) ');

		$filter = new Filter\Trim('LTRIM', '!', false);

		$this->assert->string($filter->filter($string))->isEqualTo($string);

	}

	public function testRightTrim(){

		$filter = new Filter\Trim('rtrim');

		$this->assert->string($filter->filter($string = "\n\t(Hello World!) "))->isEqualTo("\n\t(Hello World!)");

		$filter = new Filter\Trim('rtrim', '!()');

		$this->assert->string($filter->filter($string))->isEqualTo("\n\t(Hello World");

		$filter = new Filter\Trim('rtrim', '!', false);

		$this->assert->string($filter->filter($string))->isEqualTo($string);

	}

}

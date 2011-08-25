<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Url extends atoum\test {

	public function testFilter(){

		$filter = new Filter\Url();

		$this->assert->string($filter->filter($url = 'http://hello-world.com/dir/page.ext?get=var#yeah'))->isEqualTo($url)
			->setWith($filter->filter($url = 'http://root:toor@localhost/'))->isEqualTo($url)
			->setWith($filter->filter('àéèçù£êµ§¨'))->isEqualTo('');

	}

}

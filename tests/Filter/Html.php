<?php

namespace formtools\Filter\tests\units;
use \formtools\Filter;
use \mageekguy\atoum;

require_once('atoum.phar');
require_once(__DIR__.'/../autoload.php');

class Html extends atoum\test {

	public function testDefault(){

		$filter = new Filter\Html();
	
		$this->assert->string($filter->filter($text = '<tag>\'Hello "Tag"!\' Some html convertible chars & é è ç à </tag>'))
			->isEqualTo(\htmlentities($text, $filter::FLAG, $filter::CHARSET));

	}

	public function testNoQuotes(){

		$filter = new Filter\Html(Filter\Html::CHARSET, \ENT_NOQUOTES);

		$this->assert->string($filter->filter($text = '<tag>\'Hello "Tag"!\' Some html convertible chars & é è ç à </tag>'))
			->isEqualTo(\htmlentities($text, \ENT_NOQUOTES, $filter::CHARSET));

	}

	public function testBadCharset(){

		$this->assert->exception(function(){
			new Filter\Html('politic');
		})->isInstanceOf('Exception')
		->hasMessage('Charset "politic" not supported.');

	}



}

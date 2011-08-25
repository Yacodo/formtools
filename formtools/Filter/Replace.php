<?php

namespace formtools\Filter;

class Replace extends Base {

	protected $_regex;

	protected $_replace;

	public function __construct($regex, $replace){

		$this->_regex = $regex;
		$this->_replace = $replace;

	}

	public function filter($value){

		return \preg_replace($this->_regex, $this->_replace, $value);

	}

}

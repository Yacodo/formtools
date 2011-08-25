<?php

namespace formtools\Filter;

class Alnum extends Base {

	protected $_space;

	public function __construct($space = true){

		$this->_space = ((bool) $space) ? '\s' : '';

	}

	public function filter($value){

		return \preg_replace('/[^a-zA-Z0-9'. $this->_space .']/', '', $value);

	}

}

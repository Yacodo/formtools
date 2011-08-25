<?php

namespace formtools\Filter;

class Alpha extends Base {

	protected $_space;

	public function __construct($space = true){

		$this->_space = ((bool) $space) ? '\s' : '';

	}

	public function filter($value){

		return \preg_replace('/[^a-zA-Z'. $this->_space .']/', '', $value);

	}

}

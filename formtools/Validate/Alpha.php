<?php

namespace formtools\Validate;

class Alpha extends Base {

	protected $_space;

	protected $_message = array(
		self::INVALID => '"$value" must contains only alphabetic characters.'
	);

	public function __construct($space = true){

		$this->_space = ((bool) $space) ? '\s' : '';

	}

	public function isValid($value){

		if(!\preg_match('/^[a-zA-Z'. $this->_space .']+$/', $value)){

			return $this->_error(array('$value' => $value));

		}

		return true;

	}

}

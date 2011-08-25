<?php

namespace formtools\Validate;

class Int extends Base {

	protected $_options;

	protected $_message = array(
		self::INVALID => '"$value" must be an integer.'
	);

	public function __construct($options = null){

		$this->_options = $options;

	}

	public function isValid($value){

		if(!\filter_var($value, FILTER_VALIDATE_INT, $this->_options)){

			return $this->_error(array('$value' => $value));			

		}

		return true;

	}

}

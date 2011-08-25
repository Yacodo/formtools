<?php

namespace formtools\Validate;

class Float extends Base {

	protected $_options;

	protected $_message = array(
		self::INVALID => '"$value" must be a float value.'
	);

	public function __construct($options = null){

		$this->_options = $options;

	}

	/**
	 * @see Base
	**/
	public function isValid($value){

		if(!\filter_var($value, \FILTER_VALIDATE_FLOAT, $this->_options)){

			return $this->_error(array('$value' => $value));

		}

		return true;		

	}

}

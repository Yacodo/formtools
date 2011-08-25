<?php

namespace formtools\Validate;

class Ip extends Base {

	protected $_options;

	protected $_message = array(
		self::INVALID => '"$value" must be an IP.'
	);

	public function __construct($options = null){

		$this->_options = $options;

	}

	public function isValid($value){

		if(!\filter_var($value, FILTER_VALIDATE_IP, $this->_options)){

			return $this->_error(array('$value' => $value));			

		}

		return true;

	}

}

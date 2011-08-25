<?php

namespace formtools\Validate;

class Regex extends Base {

	protected $_regex;

	protected $_message = array(
		self::INVALID => '"$value" is not an expected value.'
	);

	public function __construct($regex){

		$this->_regex = $regex;

	}

	public function isValid($value){

		if(!\preg_match($this->_regex, $value)){

			return $this->_error(array('$value' => $value, '$regex' => $this->_regex));

		}

		return true;

	}

}

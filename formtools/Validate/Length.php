<?php

namespace formtools\Validate;

class Length extends Base {

	const LESS = 'less';
	const MORE = 'more';
	const ENCODING = 'UTF-8';

	protected $_min;

	protected $_max;

	protected $_encoding;

	protected $_message = array(
		self::INVALID => 'Type of value not expected.',
		self::LESS => '"$value" is less than $min characters long.',
		self::MORE => '"$value" is more than $max characters long.'
	);

	public function __construct($min = 0, $max = 0, $encoding = self::ENCODING){

		$this->_min = (int) $min;
		$this->_max = (int) $max;
		$this->_encoding = $encoding;

	}

	public function isValid($value){

		if(!\is_string($value)){

			return $this->_error(array(), self::INVALID);

		}

		$len = (\function_exists('mb_strlen')) ? \mb_strlen($value, $this->_encoding) : \strlen($value);

		if($this->_min > $len){

			return $this->_error(array('$value' => $value, '$min' => $this->_min), self:: LESS);

		}

		if($this->_max > $this->_min AND $len > $this->_max){

			return $this->_error(array('$value' => $value, '$max' => $this->_max), self::MORE);

		}

		return true;	

	}


}

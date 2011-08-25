<?php

namespace formtools\Validate;

class Inarray extends Base {

	protected $_values;

	protected $_strict;

	protected $_message = array(
		self::INVALID => '"$value" is not in the list of accepted value.'
	);

	public function __construct(array $values, $strict = false){

		$this->_values = $values;
		$this->_strict = (bool) $strict;

	}

	public function isValid($value){

		if(!\in_array($value, $this->_values, $this->_strict)){

			return $this->_error(array('$value' => $value));

		}

		return true;

	}

}

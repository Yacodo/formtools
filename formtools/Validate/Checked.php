<?php

namespace formtools\Validate;

class Checked extends Base {

	protected $_message = array(
		self::INVALID => 'Must be checked.'
	);

	public function isValid($value){

		if(\filter_var($value, \FILTER_VALIDATE_BOOLEAN) == false){

			return $this->_error(array('$value' => $value));

		}

		return true;

	}

}

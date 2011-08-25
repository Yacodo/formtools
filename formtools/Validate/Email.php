<?php

namespace formtools\Validate;

class Email extends Base {

	protected $_message = array(
		self::INVALID => 'Invalid email adress.'
	);

	public function isValid($value){

		if(!\filter_var($value, \FILTER_VALIDATE_EMAIL)){

			return $this->_error(array('$value' => $value));

		}

		return true;

	}

}

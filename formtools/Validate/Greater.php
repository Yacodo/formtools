<?php

namespace formtools\Validate;

class Greater extends Base {

	const STRICT = 'strict';

	protected $min;

	protected $_strict;

	protected $_message = array(
		self::INVALID => '"$value" must be greater than "$min".',
		self::STRICT => '"$value" must be strictly greater than "$min".'
	);

	public function __construct($min, $strict = false){

		$this->_min = $min;
		$this->_strict = (bool) $strict;

	}

	public function isValid($value){

		$min = $this->_min;
		$strict = $this->_strict;

		if(($strict AND $min >= $value)
			OR $min > $value){

			return $this->_error(
				array(
					'$value' => $value,
					'$min' => $min
				),
				($strict) ? self::STRICT : self::INVALID
			);

		}

		return true;

	}

}

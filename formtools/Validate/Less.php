<?php

namespace formtools\Validate;

class Less extends Base {

	const STRICT = 'strict';

	protected $max;

	protected $_strict;

	protected $_message = array(
		self::INVALID => '"$value" must be lower than "$max".',
		self::STRICT => '"$value" must be strictly lower than "$max".'
	);

	public function __construct($max, $strict = false){

		$this->_max = $max;
		$this->_strict = (bool) $strict;

	}

	public function isValid($value){

		$max = $this->_max;
		$strict = $this->_strict;
		
		if(($strict AND $value >= $max)
			OR $value > $max){

			return $this->_error(
				array(
					'$value' => $value,
					'$max' => $max
				),
				($strict) ? self::STRICT : self::INVALID
			);

		}

		return true;

	}

}

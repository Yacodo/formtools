<?php

namespace formtools\Validate;

class Between extends Base {

	const STRICT = 'strict';

	protected $_min;

	protected $_max;

	protected $_strict;

	protected $_message = array(
		self::INVALID => '"$value" must be between "$min" and "$max".',
		self::STRICT => '"$value" must be strictly between "$min" and "$max".'
		
	);

	public function __construct($min, $max, $strict = false){

		$this->_min = $min;
		$this->_max = $max;
		$this->_strict = (bool) $strict;

	}

	public function isValid($value){

		$min = $this->_min;
		$max = $this->_max;
		$strict = $this->_strict;

		$vars = function() use($value, $min, $max){
			
			return array(
				'$value' => $value,
				'$min' => $min,
				'$max' => $max,
			);

		};

		if($strict){

			if($this->_min >= $value OR $value >= $this->_max){

				return $this->_error($vars(), self::STRICT);

			}

		}else{

			if($this->_min > $value OR $value > $this->_max){

				return $this->_error($vars(), self::INVALID);

			}

		}

		return true;

	}

}

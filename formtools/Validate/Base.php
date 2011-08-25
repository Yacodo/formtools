<?php

namespace formtools\Validate;

abstract class Base {

	const INVALID = 'invalid';

	protected $_message = array();

	abstract public function isValid($value);

	public function setMessage($message, $name = self::INVALID){

		$this->_message[$name] = $message;
		return $this;

	}

	protected function _error(array $vars, $name = self::INVALID){

		return \str_replace(\array_keys($vars), \array_values($vars), $this->_message[$name]);

	}

	public function __invoke($value){

		return $this->isValid($value);

	}

}

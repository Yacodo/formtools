<?php

namespace formtools\Filter;

class Trim extends Base {

	const TRIM = 'trim';
	const LTRIM = 'ltrim';
	const RTRIM = 'rtrim';

	const CHARS = "\t\n\r\0\x0B ";

	protected $_method;

	protected $_chars;

	public function __construct($method = null, $chars = null, $default = true){

		if($method == null){

			$method = self::TRIM;

		}

		if($method != null AND !\in_array(\strtolower($method), array('trim', 'ltrim', 'rtrim'))){

			$default = ($chars !== false) ? true : false;
			$chars = $method;
			$method = 'trim';

		}

		$this->_method = $method;
		$this->_chars = (string) $chars . (($default) ? self::CHARS : null);

	}

	public function filter($value){

		return \call_user_func('\\'.$this->_method, $value, $this->_chars);

	}

}

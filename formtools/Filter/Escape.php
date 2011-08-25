<?php

namespace formtools\Filter;

class Escape extends Base {

	const FLAG = \ENT_QUOTES;
	const CHARSET = 'UTF-8';

	protected $_flag;

	protected $_charset;

	protected $_allowedCharset = array(
		'ISO-8859-1',
		'ISO-8859-15',
		'UTF-8',
		'cp866',
		'cp1251',
		'cp1252',
		'KOI8-R',
		'BIG5',
		'GB2312',
		'BIG5-HKSCS',
		'Shift_JIS',
		'EUC-JP'
	);

	public function __construct($charset = self::CHARSET, $flag = self::FLAG){

		if(!\in_array($charset, $this->_allowedCharset)){

			throw new \Exception('Charset "'.$this->filter($charset).'" not supported.');

		}

		$this->_charset = $charset;
		$this->_flag = $flag;

	}

	public function filter($value){

		return \htmlspecialchars($value, $this->_flag, $this->_charset);

	}

}

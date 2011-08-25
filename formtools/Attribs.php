<?php

namespace formtools;

abstract class Attribs {

	private $_attribs = array();

	public function addAttrib($name, $value){

		$this->_attribs[(string) $name] = $value;
		return $this;

	}

	public function addAttribs(array $attribs){
		
		$this->_attribs = \array_merge($this->_attribs, $attribs);
		return $this;

	}

	public function getAttrib($name){

		return (isset($this->_attribs[$name])) ? $this->_attribs[$name] : false;

	}

	public function generateAttribs(array $add = null, $displayValue = true){

		$attribs = (\is_array($add))
			?\array_merge($this->_attribs, $add)
			:$this->_attribs;

		$return = '';
		$escape = new Filter\Escape();

		foreach($attribs AS $key => $value){
		
			//Escape "value" for value attribute: user input
			//No need to escape everything
			$tmp = ($key == 'value') ? $escape($value) : $value;
		
			$return.= (\is_string($key))? ' '.$key.'="'.$tmp.'"' : ' '.$tmp;
		
		}

		return $return;		

	}

}

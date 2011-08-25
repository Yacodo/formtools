<?php

namespace formtools\Filter;

abstract class Base {

	abstract public function filter($value);

	public function __invoke($value){
		
		return $this->filter($value);

	}

}

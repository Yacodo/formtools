<?php

namespace formtools\Filter;

class Int extends Base {

	public function filter($value){

		return (int) $value;

	}

}

<?php

namespace formtools\Filter;

class Float extends Base {

	public function filter($value){

		return (float) $value;

	}

}

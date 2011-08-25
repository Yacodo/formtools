<?php

namespace formtools\Filter;

class Lower extends Base {

	public function filter($value){

		return \strtolower($value);

	}

}

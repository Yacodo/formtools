<?php

namespace formtools\Filter;

class Upper extends Base {

	public function filter($value){

		return \strtoupper($value);

	}

}

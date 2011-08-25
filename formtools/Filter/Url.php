<?php

namespace formtools\Filter;

class Url extends Base {

	public function filter($value){

		return \filter_var($value, FILTER_SANITIZE_URL);

	}

}

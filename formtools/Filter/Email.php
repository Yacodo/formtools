<?php

namespace formtools\Filter;

class Email extends Base {

	public function filter($value){

		return \filter_var($value, FILTER_SANITIZE_EMAIL);

	}

}

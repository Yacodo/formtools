<?php

namespace formtools\Filter;

class Bool extends Base {

	public function filter($value){

		return (bool) $value;

	}

}

<?php

namespace formtools\Validate;

abstract class Factory {

	static public function create($validator, array $params = null){

		if(!\is_string($validator)){
		
			throw new \Exception('Something wrong, formtools\Validate\Factory need a string as validator (' . \gettype($validator) . ' given).');

		}

		$validator = \ucwords(\strtolower($validator));

		if(!\is_file(\realpath(__DIR__.'/'.$validator.'.php'))){
			
			throw new \Exception('Validator not found "formtools\Validate\\'.$validator.'".');

		}

		$cnt = \count($params);

		//Yep, something need to be ugly in PHP...
		$validator = '\\' . __NAMESPACE__ . '\\' . $validator;

		switch($cnt){
			case 1:
				return new $validator($params[0]);
			case 2:
				return new $validator($params[0], $params[1]);
			case 3:
				return new $validator($params[0], $params[1], $params[2]);
			case 4:
				return new $validator($params[0], $params[1], $params[2], $params[3]);
			case 5:
				return new $validator($params[0], $params[1], $params[2], $params[3], $params[4]);
			case 6:
				return new $validator($params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);
			default:
				return new $validator();
		}


	}

}

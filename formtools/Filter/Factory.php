<?php

namespace formtools\Filter;

abstract class Factory {

	static public function create($filter, array $params = null){

		$filter = \ucwords(\strtolower($filter));

		if(!\is_file(\realpath(__DIR__.'/'.$filter.'.php'))){
			
			throw new \Exception('Filter not found "formtools\Filter\\'.$filter.'".');

		}

		$cnt = \count($params);

		//Yep, something need to be ugly in PHP...
		$filter = '\\'. __NAMESPACE__ .'\\'.$filter;

		switch($cnt){
			case 1:
				return new $filter($params[0]);
			case 2:
				return new $filter($params[0], $params[1]);
			case 3:
				return new $filter($params[0], $params[1], $params[2]);
			case 4:
				return new $filter($params[0], $params[1], $params[2], $params[3]);
			case 5:
				return new $filter($params[0], $params[1], $params[2], $params[3], $params[4]);
			case 6:
				return new $filter($params[0], $params[1], $params[2], $params[3], $params[4], $params[5]);
			default:
				return new $filter();
		}

	}

}

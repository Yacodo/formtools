<?php

namespace formtools;

abstract class Autoloader {

	static private $_root;

	static private $_prefs = array();

	static private $_dirs = array();

	static public function add($pref, $dir){

		self::$_prefs[] = '/^'.\preg_quote($pref, '/').'/';
		self::$_dirs[] = \str_replace('$root', self::$_root, $dir);

	}

	static public function init($root = '', array $list = null) {

		if($root AND !\is_dir($root)){

			throw new \Exception('Dir not found.');

		}
		
		self::$_root = \realpath($root);

		if($list){

			foreach($list AS $pref => $dir){

				self::add($pref, $dir);

			}

		}

   		\spl_autoload_register(__CLASS__.'::load');
		
	}

	static private function resolve($name){

		$name = \preg_replace(self::$_prefs, self::$_dirs, $name);
		$name = \str_replace(array('_', '\\'), DIRECTORY_SEPARATOR, $name);
		return $name . '.php';

	}

	static public function load($name) {

		$file = self::resolve($name);
	
		if(\is_file($file)){

			require_once($file);

		}else{

			throw new \Exception('File "'.$file.'" ('.$name.') not found.');

		}

	}

	static public function isCallable($name, $returnFile = false){

		$file = self::resolve($name);

		if(\is_file($file)){
			
			return ($returnFile) ? $file : true;
		
		}

		return false;

	}

}

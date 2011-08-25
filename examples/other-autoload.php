<?php

/**
 * See autoload.php before.
 * This one made exactly the same job 
 *
 * In a front controller during "configuration time" 
 * we can load configuration file (ini/json/yaml/etc...)
 * with list of key/value as array.
 *
 * Autoloader::init() second parameter can take an array to replace multiple ::add() calls
 * conf.ini give the same rules 
 * array('formtools\\' => '$root/form-tools/', 'examples\Form\' => '$root/form-tools/examples/Form/');
**/

namespace formtools;

$rootApp = __DIR__ . '/..';

require_once($rootApp . '/formtools/Autoloader.php');

$conf = \parse_ini_file('./conf.ini', true); // True for ini section

Autoloader::init($rootApp, $conf['autoloader']);


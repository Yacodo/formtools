<?php

namespace formtools;

$ftDir = __DIR__.'/../formtools';

require_once($ftDir . '/Autoloader.php');

$prefix = array(
	'formtools' => '$root'
);

Autoloader::init($ftDir, $prefix);

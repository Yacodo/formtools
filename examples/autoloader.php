<?php

/**
 * Simple autoloader, "remember" the root_app dir,
 * Add some couple prefix:dir 
 * use $root in the dir path for replace it by root_app dir
**/

//Root namespace for the "library"
namespace formtools;

$rootApp = __DIR__.'/..';

require_once($rootApp . '/formtools/Autoloader.php');

Autoloader::init($rootApp);

Autoloader::add('formtools\\', '$root/formtools/');
Autoloader::add('examples\Form\\', '$root/examples/Form/');

/**
 * Note :
 * Generally developers call root_app (or similar var) the directory that contain all files for an application
 * Good MVC project run with a front_controller.php in the root_app so you only need to do : (in this file)
 * Autoloader::init(__DIR__);
 *
 * You can use a file for configuration, see other-autoloader.php
 *
 * If you are using this library without basic knowledge of PHP 5.3, Google it, especially for namespace and closure system
 * The new __DIR__ magical constant replace the dirname(__FILE__) trick.
 * 
 * Links :
 * http://www.php.net/manual/en/language.namespaces.php
 * http://www.php.net/manual/en/functions.anonymous.php
 * http://www.php.net/manual/en/language.constants.predefined.php
**/

<?php

namespace examples\Form;
use \formtools\Filter;

require_once('autoloader.php');

$form = new User('create');

if($form->isValid()){

	$filter = new Filter\Escape();

	header('Content-Type: text/plain; charset=utf-8');
	echo "New account :\n";
	echo "\tLogin :\t" . $filter($form->email->getValue()) . "\n";
	echo "\tPassword :\t" . $filter($form->passwd->getValue()) . " (" . $form->passwd2->getValue() .")";

}else{

	echo $form;

}

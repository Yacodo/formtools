<?php

namespace examples\Form;
use \formtools\Filter;

require_once('autoloader.php');

$form = new User('login');

if($form->isValid()){

	$filter = new Filter\Escape();

	//$form->elementName->getValue() == $form->getValue('elementName')
	echo 'Logged as '.$filter($form->email->getValue()).' (pwd : '.$filter($form->getValue('passwd')).' ).';

}else{
	
	echo $form;

}

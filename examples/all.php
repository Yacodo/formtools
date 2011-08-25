<?php

namespace examples\Form;

require_once('autoloader.php');

$form = new All();

if($form->isValid()){

	var_dump($form->getValues());

}
	
echo $form;

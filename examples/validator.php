<?php

namespace examples\Form;

require_once('autoloader.php');

$form = new Validator();

if($form->isValid()){

	\var_dump($form->getValues());

}

echo '<html>';
echo '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head>';
echo '<body>';
echo $form;
echo '</body></html>';

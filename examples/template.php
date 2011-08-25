<?php

namespace examples\Form;

require_once('autoloader.php');

$form = new Template();

$form->isValid(); // For the error

echo $form;

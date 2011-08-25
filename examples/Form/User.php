<?php

//namespace for formtools\Form children,
//but you can use everything you want. Like (Form, MyForm, models/Form, etc...)
namespace examples\Form;

use \formtools;
use \formtools\Form\Element;
use \formtools\Validate;

class User extends formtools\Form {

	public function configure($type){

		//Simple User Information
		//For simple example, I configure element regardless of the "$type" of form

		//Pseudo as login identifier must die.
		$email = new Element\Text('email', 'Email :');
		$email->addFilter('email')->addValidator('email');

		$passwd = new Element\Password('passwd', 'Password :');
		$passwd2 = new Element\Password('passwd2', 'Repeat :');
		
		//Same validator on both ? Fine, let's try this
		$lengthPasswd = new Validate\Length(4, 50);

		$passwd->addValidator($lengthPasswd);
		$passwd2->addValidator($lengthPasswd);
		//Work !

		//And submit button
		$submit = new Element\Submit('submit');
		$submit->setValue( ($type == 'login') ? 'Login' : 'Create' ); //Login or Create, using $type value

		if($type == 'create'){

			//Create an account ? need to passwd == passwd2
			//Ok, don't have a validator for that... damn !

			$passwd->addValidator(function($value, $values){ //value contains the element value (passwd in this case) $values : all values in form
				//Yeah Closure rocks !
				//True or error message (maybe bad system, but filter created just for form system, not everything)

				return ($value == $values['passwd2']) // Equal to $values['passwd'] == $values['passwd2']
					? true
					: 'Need same passwords.';

			});

		}

		if(!\in_array($type, array('login', 'create'))){ $type = 'login'; }

		switch($type){
			case 'create':
				$this->addElements(array($email, $passwd, $passwd2, $submit));
				break;

			case 'login':
				$this->addElements(array($email, $passwd, $submit)); // Need only email and password for a login form, right ?
				break;

			//Now you can create a retrieve password, using email as identifier
			//Change password, using passwd and passwd2
			//Try to imagine more than me.
		}

	}

}

<?php

namespace examples\Form;
use \formtools;
use \formtools\Validate;
use \formtools\Form\Element;

class Validator extends formtools\Form {

	public function configure(){

		$alnum = new Element\Text('alnum', 'Validator alnum :');	

		$vAlnum = new Validate\Alnum();
		$vAlnum->setMessage('remove "."');

		$alnum->addValidator($vAlnum)->setValue('.abcdefghijklmnopqrstuvwxyz 0123456789');

		$alpha = new Element\Text('alpha', 'Validator alpha :');	

		$vAlpha = new Validate\Alpha();
		$vAlpha->setMessage('remove "0"');

		$alpha->addValidator($vAlpha)->setValue('0abcdefghijklmnopqrstuvwxyz ');
		
		$between = new Element\Text('between', 'Validator between :');	

		$vBetween = new Validate\Between(0, 50);
		$vBetween->setMessage('Set "42" as a value (between 0 and 50)');

		$between->addValidator($vBetween)->setValue('51');
		
		$checked = new Element\Checkbox('checked', 'Validator checked :');	

		$vChecked = new Validate\Checked();
		$vChecked->setMessage('Check ME !');

		$checked->addValidator($vChecked)->setValue(false);
		
		$email = new Element\Text('email', 'Validator email :');	

		$vEmail = new Validate\Email();
		$vEmail->setMessage('Remove space');

		$email->addValidator($vEmail)->setValue('yacodoo@gmail .com');
		
		$float = new Element\Text('float', 'Validator float :');	

		$vFloat = new Validate\Float();
		$vFloat->setMessage('Set "2.1" as value');

		$float->addValidator($vFloat)->setValue('2 dot 1');
		
		$greater = new Element\Text('greater', 'Validator greater :');	

		$vGreater = new Validate\Greater(88);
		$vGreater->setMessage('Set 88 as value (greater than or equal 88, strict mode unactive)');

		$greater->addValidator($vGreater)->setValue(87);
		
		$inarray = new Element\Text('inarray', 'Validator inarray :');	

		$vInarray = new Validate\Inarray(array('hello', 'bye'));
		$vInarray->setMessage('Set "hello" as value');

		$inarray->addValidator($vInarray)->setValue('bonjour');
		
		$int = new Element\Text('int', 'Validator int :');	

		$vInt = new Validate\Int();
		$vInt->setMessage('Set "2011" as value');

		$int->addValidator($vInt)->setValue('two thousand eleven');
		
		$ip = new Element\Text('ip', 'Validator ip :');	

		$vIp = new Validate\Ip();
		$vIp->setMessage('Set "127.0.0.1" as value');

		$ip->addValidator($vIp)->setValue('localhost');
		
		$length = new Element\Text('length', 'Validator length :');	

		$vLength = new Validate\Length(5, 50);
		$vLength->setMessage('Set "hello length!" as value', $vLength::LESS);

		$length->addValidator($vLength)->setValue('hi!');
		
		$less = new Element\Text('less', 'Validator less :');	

		$vLess = new Validate\Less(10);
		$vLess->setMessage('Set "9" as value (less than or equal to 10, strict mode unactive)');

		$less->addValidator($vLess)->setValue(11);
		
		$regex = new Element\Text('regex', 'Validator regex :');	

		$vRegex = new Validate\Regex('/^a+$/');
		$vRegex->setMessage('Set "aa" as value (/^a+$/)');

		$regex->addValidator($vRegex)->setValue('bb');
		
		$submit = new Element\Submit('submit');
		$submit->setValue('Click me');

		$this->addElements(
			array(
				$alnum,
				$alpha,
				$between,
				$checked,
				$email,
				$float,
				$greater,
				$inarray,
				$int,
				$ip,
				$length,
				$less,
				$regex,
				$submit
			)
		);

	}

}

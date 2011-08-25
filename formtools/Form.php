<?php

namespace formtools;

class Form extends Attribs {

	private $_generation;

	private $_decorators;

	private $_elements;

	final public function __construct($configuration = true, $decorators = true){

		$this->_generation = true;
		$this->_elements = array();

		$this->addAttrib('method', 'POST');

		if($decorators == true){
			
			$this->setDecorators('<table>', '</table>');

		}

		if($configuration AND \method_exists($this, 'configure')){
			
			$this->configure($configuration);

		}

	}

	public function setGeneration($generation){

		if(\is_string($generation) AND !\is_file($generation)){

			throw new Exception('Booleen or filename excepted.');

		}

		//No handling for false and other value
		if(!\is_string($generation)){

			$this->_generation = true;

		}

		$this->_generation = $generation;
		return $this;

	}

	public function setDecorators($prepend = null, $append = null){

		$this->_decorators = array('prepend' => $prepend, 'append' => $append);
		return $this;

	}

	public function addElements($elements){
		
		$elements = (array) $elements;

		foreach($elements AS $element){

			if($element instanceof Form\Element){

				$this->_elements[$element->getName()] = $element;

			}else{
				
				//Getting type of var, if object get the name.
				$type = (($type = \gettype($element)) == 'object')
					?\get_class($element)
					:$type;
				

				throw new \Exception('Not a formtools\Form\Element or derivated ('.$type.').');

			}

		}

		return $this;

	}

	public function removeElements($elements){

		$elements = (array) $elements;

		foreach($elements AS $element){

			unset($this->_elements[$element]);

		}

		return $this;

	}

	protected function formOpen(){

		return '<form'.$this->generateAttribs().'>';

	}

	public function __toString(){

		if($this->_generation !== true){

			$form = \file_get_contents($this->_generation);

			$search = array();
			$replace = array();

			$search[] = '$open;';
			$replace[] = $this->formOpen();

			foreach($this->_elements AS $name => $element){

				$var = '$'.$name;

				$search[] = $var.'->label;';
				$replace[] = $element->getLabel();
				$search[] = $var.'->error;';
				$replace[] = $element->generateError();
				$search[] = $var.'->element;';
				$replace[] = $element->generateElement();

			}

			$search[] = '$close;';
			$replace[] = '</form>';

			$form = \str_replace($search, $replace, $form);

		}else{

			$form = $this->formOpen().$this->_decorators['prepend'];

			foreach($this->_elements AS $element){

				$form.= $element->generate();

			}

			$form.= $this->_decorators['append'].'</form>';

		}

		return (string) $form;

	}

	public function isValid(){

		$status = true;

		$results = ($this->getAttrib('method') == 'POST') ? $_POST : $_GET;

		foreach($this->_elements AS $name => $element){

			if(!($element instanceof Form\Element\Push)){

				//Checkbox and Radio are not send when not checked AND files in $_FILES
				if(!isset($results[$name]) AND $_SERVER['REQUEST_METHOD'] == 'POST'){

					if($element instanceof Form\Element\Checkbox OR $element instanceof Form\Element\Radio){

						$results[$name] = false;

					}elseif($element instanceof Form\Element\File){

						$results[$name] = (isset($_FILES[$name])) ? $_FILES[$name] : array();

					}

				}

				if(!isset($results[$name]) OR !$element->isValid($results[$name], $results)){

					$status = false;

				}

			}

		}

		return $status;

	}

	public function __get($name){

		return (isset($this->_elements[$name])) ? $this->_elements[$name] : false;

	}

	public function setValue($name, $value){

		return ($var = $this->__get($name)) ? $var->setValue($value) : false;

	}

	public function setValues(array $values){

		foreach($values AS $name => $value){

			if(isset($this->_elements[$name])){

				$this->_elements[$name]->setValue($name);

			}

		}

		return $this;

	}

	public function getValue($name){

		return ($var = $this->__get($name)) ? $var->getValue() : false;	

	}

	public function getValues(){

		$return = array();

		foreach($this->_elements AS $name => $element){
		
			if(!($element instanceof Form\Element\Push)){

				$return[$name] = $element->getValue();

			}

		}

		return $return;

	}

}

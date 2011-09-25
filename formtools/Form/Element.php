<?php

namespace formtools\Form;

abstract class Element extends \formtools\Attribs {
	
	protected $_label;
	protected $_value;
	protected $_error;

	protected $_filters;
	protected $_validators;

	protected $_position;

	protected $_decorators;
	protected $_errorDecorators;
	protected $_labelDecorators;
	protected $_elementDecorators;

	abstract public function generateElement();

	final public function __construct($name = null, $label = null, $decorators = true){

		if(!\is_string($name)){

			throw new Exception('"'.formtools\Filter::escape($name).'" is not a valid name.');

		}

		$this->_label = $label;
		$this->addAttrib('name', $name);

		$this->_filters = array();
		$this->_validators = array();

		if($decorators){

			$this->decorators();

		}

	}

	public function getName(){

		return $this->getAttrib('name');

	}

	public function setLabel($label){

		$this->_label = $label;
		return $this;

	}

	public function getLabel(){

		return $this->_label;

	}

	public function setValue($value){

		$this->_value = $value;
		return $this;

	}

	public function getValue(){

		return $this->_value;

	}

	public function getError(){

		return $this->_error;

	}

	/**
	 * Add a filter
	 * addFilter(\Closure $filter);
	 * addFilter(\formtools\Filter\Base $filter);
	 * addFilter($filter, array $params = null);
	 *
	 * @param \Closure|string Closure or name of filter in (formtools\Filter)
	 * @param array List of parameters for the filter method (if name)
	 * @return Element
	**/
	public function addFilter($filter, $params = null){

		if(!($filter instanceof \Closure) AND !($filter instanceof \formtools\Filter\Base)){

			$params = (array) $params;
			$filter = \formtools\Filter\Factory::create($filter, $params);

		}

		$this->_filters[] = $filter;

		return $this;

	}

	/**
	 * Add a validator
	 * addValidator(\Closure $validator)
	 * addValidator(\formtools\Validate\Base $validator)
	 * addValidator($filter, array $params = null);
	 *
	 * @param \Closure|string $validator Closure or name of validator in (formtools\Validator)
	 * @param array List of parameters to the validator method
	 * @return Element
	**/
	public function addValidator($validator, $params = null){

		if(!($validator instanceof \Closure) AND !($validator instanceof \formtools\Validate\Base)){

			$params = (array) $params;
			$validator = \formtools\Validate\Factory::create($validator, $params);

		}

		$this->_validators[] = $validator;

		return $this;

	}

	public function setPosition($position){

		$this->_position = (array) $position;
		return $this;

	}

	public function setDecorators($prepend = null, $append = null){

		$this->_decorators = array('prepend' => $prepend, 'append' => $append);
		return $this;

	}

	public function setErrorDecorators($prepend = null, $append = null){

		$this->_errorDecorators = array('prepend' => $prepend, 'append' => $append);
		return $this;

	}


	public function setLabelDecorators($prepend = null, $append = null){

		$this->_labelDecorators = array('prepend' => $prepend, 'append' => $append);
		return $this;

	}

	public function setElementDecorators($prepend = null, $append = null){

		$this->_elementDecorators = array('prepend' => $prepend, 'append' => $append);
		return $this;

	}

	public function decorators(){

		$this->setPosition(array('label', 'element'));
		$this->setDecorators('<tr>', '</tr>');
		$this->setErrorDecorators(null, '<br/>');
		$this->setLabelDecorators('<td>', '</td>');
		$this->setElementDecorators('<td>', '</td>');

		return $this;

	}

	public function clearDecorators(){

		$this->decorators()
			->errorDecorators()
			->labelDecorators()
			->elementDecorators();

		return $this;

	}

	public function __toString(){

		return (string) $this->generate();

	}

	public function generateLabel(){

		/**
		 * TODO
		 * Need to generate id if missing, accessibility will rule the world... one day.
		 * Like elementName_elementType (formName isn't required...)
		**/
		if(($id = $this->getAttrib('id')) !== false){

			$this->labelDecorators(
				$this->_labelDecorators['prepend'].'<label for="'.$id.'">',
				'</label>'.$this->_labelDecorators['append']);

		}

		return $this->_labelDecorators['prepend'] . $this->getLabel() . $this->_labelDecorators['append'];

	}

	public function generateError(){

		return (!\is_null($this->_error)) 
			? $this->_errorDecorators['prepend'] . $this->_error . $this->_errorDecorators['append']
			: '';

	}

	public function generate(){

		$all = $this->_decorators['prepend'];

		foreach($this->_position AS $part){

			if($part == 'label'){

				$all.= $this->generateLabel();

			}elseif($part == 'element'){

				$all.= $this->_elementDecorators['prepend'];
				
				//TODO Multidimensional array for choose the error position.
				$all.= $this->generateError();

				$all.= $this->generateElement($this->_value);
				$all.= $this->_elementDecorators['append'];

			}

		}

		$all.= $this->_decorators['append'];

		return $all;

	}

	public function isValid($value, array $values = null){

		if($cnt = \count($this->_filters)){

			for($i = 0; $i < $cnt; ++$i){

				$value = $this->_filters[$i]->__invoke($value, $values);	
	
			}

		}

		$status = true;

		if($cnt = \count($this->_validators)){

			$i = 0;

			do{
			
				$return = $this->_validators[$i]->__invoke($value, $values);
				++$i;

			}while($return AND $i < $cnt);//Stop after the first fail.
			
			if($return !== true){

				$this->_error = $return;
				$status = false;

			}

		}

		$this->setValue($value);

		return $status;

	}

}

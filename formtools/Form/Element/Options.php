<?php

namespace formtools\Form\Element;

abstract class Options extends \formtools\Form\Element {

	protected $_options = array();

	/**
	 * Add an option :
	 * <option value="$value">$label</option>
	 * <input type="radio|checkbox" value="$value"/> $label
	 *
	 * @param string $value Value of option
	 * @param string $label Label of option
	 * @return Options
	 */
	public function addOption($value, $label){

		$this->_options[$value] = $label;
		return $this;

	}

	/**
	 * Add multiple options
	 * Pair key:value = $value => $label
	 *
	 * @see Content of Options::addOption()
	 * @param array $options Array of options
	 * @return Options
	 */
	public function addOptions(array $options){

		$this->_options = \array_merge($this->_options, $options);
		return $this;

	}

}

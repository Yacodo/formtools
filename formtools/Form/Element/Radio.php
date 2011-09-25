<?php

namespace formtools\Form\Element;

class Radio extends Options {
	
	function generateElement(){

		$return = '';

		$id = $this->getAttrib('id');
		$i = 0;

		foreach($this->_options AS $value => $label){

			//<br /> if one or more radio already generated
			if($return != ''){ $return.= '<br /> '; }

			$attribs = array();
			$attribs['type'] = 'radio';
			$attribs['value'] = $value;
			$attribs['id'] = $id . '_' . ++$i;

			if($value == $this->_value){

				$attribs['checked'] = 'checked';

			}

			$return.= '<input' . $this->generateAttribs($attribs) . '/> ' . $label;

		}

		return $return;
		
	}
	
}

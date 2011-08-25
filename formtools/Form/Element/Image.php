<?php

namespace formtools\Form\Element;

class Image extends Push {

	private $_image;

	/**
	 * Link to image
	 *
	 * @param string $image Link
	 * @return Image
	 */
	public function setImage($image){

		$this->_image = $image;
		return $this;

	}

	public function generateElement(){

		return $this->generateInput(array('type' => 'image', 'src' => $this->_image));
		
	}

}

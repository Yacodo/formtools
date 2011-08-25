formtools
=========
	formtools is a basic library for handle forms.

Basic knowledge:
----------------
	- Work on PHP > 5.3
	- Create form using a class : reusable system (and multiple configuration in one class @see examples/Form/User.php)
	- Simple form generation using <table> <tr> and <td> (@see examples/all.php for defaults "decorators")
	- Generating form using simple "template" file
	- Three types of elements :
		- Push (Button, Image, Reset, Submit)
			- Not required for validation
		- Input (Checkbox, File, Hidden, Password, Text)
			-Simple creation if you need special attribute frequently
		- Options (Radio, Select and one day MultiCheckbox for name="checkbox[keyOne]" like)
		
		- And Textarea (4 types ? nooo !)
	- Simple filter and validator
		-Take a look in the source, I use some PHP function : you may need to know thier behavior
		-Can use Closure
		-Need perfect filter and validator ? Create your own.
	- Inspired by Zend_Form system, but formtools focus only on form (Filter and Validate on ZF are reusable elsewhere)
		- "Decorators system in ZF will be better in ZF2", if this real : formtools will be useless
		- I create this library only for the "render system"

Documentation:
--------------
	- The only things you need : examples/ (index.html)
	- Miss something ? formtools/
	- Encore ? Email me at yacodoo[at]gmail[dot]com, and I will try to give you a response 

Think this library could be more powerful ? 
Daft Punk advice : Fork it, code it, push it.

TODO:
-----
	- formtools\Form\Element->generateLabel() Generate a smart ID if missing 
	- Add a MultipleCheckbox Element (for handle multiple checkbox with the same name checkbox[keyOne] checkbox[keyTwo]
	- Modify Filter and Validator (More powerful, and configurable)

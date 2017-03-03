<?php

namespace CodeEmailMkt\Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class TagForm extends Form
{
	public function __construct($name = 'client', array $options = [])
	{
		parent::__construct($name, $options);

		$this->add([
			'name' => 'id',
			'type' => Element\Hidden::class 
		]);

		$this->add([
			'name' => 'name',
			'type' => Element\Text::class,
			'options' => [
				'label' => 'Nome'
			],
			'attributes' => [
				'id' => 'name'
			]
		]);

		$this->add([
			'name' => 'submit',
			'type' => Element\Button::class,
			'attributes' => [
				'type' => 'submit'
			]
		]);
	}
}
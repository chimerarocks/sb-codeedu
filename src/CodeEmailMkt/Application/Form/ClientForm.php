<?php

namespace CodeEmailMkt\Application\Form;

use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class ClientForm extends Form
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
			'name' => 'email',
			'type' => Element\Text::class,
			'options' => [
				'label' => 'Email'
			],
			'attributes' => [
				'id' => 'email',
				'type' => 'email'
			]
		]);

		$this->add([
			'name' => 'cpf',
			'type' => Element\Text::class,
			'options' => [
				'label' => 'Cpf'
			],
			'attributes' => [
				'id' => 'cpf',
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
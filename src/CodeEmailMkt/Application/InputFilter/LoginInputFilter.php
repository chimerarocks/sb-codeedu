<?php

namespace CodeEmailMkt\Application\InputFilter;

use Zend\Filter\StringTrim;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;

class LoginInputFilter extends InputFilter
{
	public function __construct()
	{
		$this->add([
			'name' 		 => 'email',
			'required'	 => true,
			'filters' 	 => [
					['name' => StringTrim::class]
			],
			'validators' => [
				[
					'name'		=> NotEmpty::class,
					'options' 	=> [
						'message' => [
							NotEmpty::IS_EMPTY => 'Este campo é requerido'
						]
					]
				],
				[
					'name'		=> EmailAddress::class,
					'options' 	=> [
						'message' => [
							EmailAddress::INVALID => 'Este email não é válido'
						]
					]
				]
			]
		]);

		$this->add([
			'name' 		 => 'password',
			'required'	 => true,
			'validators' => [
				[
					'name'		=> NotEmpty::class,
					'options' 	=> [
						'message' => [
							NotEmpty::IS_EMPTY => 'Este campo é requerido'
						]
					]
				]
			]
		]);
	}
}
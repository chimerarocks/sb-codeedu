<?php

namespace CodeEmailMkt\Application\InputFilter;

use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;
use Zend\InputFilter\InputFilter;
use Zend\Validator\EmailAddress;
use Zend\Validator\NotEmpty;

class TagInputFilter extends InputFilter
{
	public function __construct()
	{
		$this->add([
			'name'	   => 'name',
			'required' => true,
			'filters'  => [
				['name' => StringTrim::class],
				['name'	=> StripTags::class]
			],
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
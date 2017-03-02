<?php

namespace CodeEmailMkt\Application\Form\Factory;

use CodeEmailMkt\Application\Form\LoginForm;
use CodeEmailMkt\Application\InputFilter\LoginInputFilter;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

class LoginFormFactory
{
	public function __invoke(ContainerInterface $container): LoginForm
	{
		$form = new LoginForm();
		// $form->setHydrator(new ClassMethods());
		// $form->setObject(new Client());
		$form->setInputFilter(new LoginInputFilter());

		return $form;		
	}
}
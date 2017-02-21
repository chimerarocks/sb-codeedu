<?php

namespace CodeEmailMkt\Application\Form\Factory;

use Zend\Hydrator\ClassMethods;
use CodeEmailMkt\Domain\Entity\Client;
use Interop\Container\ContainerInterface;
use CodeEmailMkt\Application\Form\ClientForm;
// use CodeEmailMkt\Application\InputFilter\ClientInputFilter;

class ClientFormFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$form = new ClientForm();
		$form->setHydrator(new ClassMethods());
		$form->setObject(new Client());
		// $form->setInputFilter(new ClientInputFilter());

		return $form;		
	}
}
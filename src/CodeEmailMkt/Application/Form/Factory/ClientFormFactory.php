<?php

namespace CodeEmailMkt\Application\Form\Factory;

use CodeEmailMkt\Application\Form\ClientForm;
use CodeEmailMkt\Application\InputFilter\ClientInputFilter;
use CodeEmailMkt\Domain\Entity\Client;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

class ClientFormFactory
{
	public function __invoke(ContainerInterface $container): ClientForm
	{
		$entityManager = $container->get(EntityManager::class);
		$form = new ClientForm();
		$form->setHydrator(new ClassMethods());
		$form->setObject(new Client());
		$form->setInputFilter(new ClientInputFilter());
		$form->setObjectManager($entityManager);
		$form->init();
		return $form;		
	}
}
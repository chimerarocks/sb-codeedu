<?php

namespace CodeEmailMkt\Application\Form\Factory;

use CodeEmailMkt\Application\Form\CampaignForm;
use CodeEmailMkt\Application\InputFilter\CampaignInputFilter;
use CodeEmailMkt\Domain\Entity\Campaign;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;

class CampaignFormFactory
{
	public function __invoke(ContainerInterface $container): CampaignForm
	{
		$entityManager = $container->get(EntityManager::class);
		$form = new CampaignForm();
		$form->setHydrator(new DoctrineHydrator($entityManager));
		$form->setObject(new Campaign());
		$form->setInputFilter(new CampaignInputFilter());
		$form->setObjectManager($entityManager);
		$form->init();
		return $form;		
	}
}
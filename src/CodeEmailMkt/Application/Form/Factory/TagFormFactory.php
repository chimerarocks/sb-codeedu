<?php

namespace CodeEmailMkt\Application\Form\Factory;

use CodeEmailMkt\Application\Form\TagForm;
use CodeEmailMkt\Application\InputFilter\TagInputFilter;
use CodeEmailMkt\Domain\Entity\Tag;
use Interop\Container\ContainerInterface;
use Zend\Hydrator\ClassMethods;

class TagFormFactory
{
	public function __invoke(ContainerInterface $container): TagForm
	{
		$form = new TagForm();
		$form->setHydrator(new ClassMethods());
		$form->setObject(new Tag());
		$form->setInputFilter(new TagInputFilter());

		return $form;		
	}
}
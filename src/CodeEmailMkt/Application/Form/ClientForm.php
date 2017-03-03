<?php

namespace CodeEmailMkt\Application\Form;

use CodeEmailMkt\Domain\Entity\Tag;
use DoctrineModule\Form\Element\ObjectSelect;
use DoctrineModule\Persistence\ObjectManagerAwareInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\Form\Element;
use Zend\Form\Form;
use Zend\Stdlib\Hydrator\ClassMethods;

class ClientForm extends Form implements ObjectManagerAwareInterface
{
	private $objectManager;

	public function __construct($name = 'client', array $options = [])
	{
		parent::__construct($name, $options);
	}

	public function init()
	{
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
			'name' => 'tags',
			'type' => ObjectSelect::class,
			'options' => [
				'object_manager' => $this->objectManager,
				'target_class'   => Tag::class,
				'property'		 => 'name'
			],
			'attributes' => [
				'multiple' => 'multiple',
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

	/**
     * Set the object manager
     *
     * @param ObjectManager $objectManager
     */
	public function setObjectManager(ObjectManager $objectManager)
	{
		$this->objectManager = $objectManager;
	}

	/**
     * Get the object manager
     *
     * @return ObjectManager
     */
	public function getObjectManager()
	{
		return $this->objectManager;
	}
}
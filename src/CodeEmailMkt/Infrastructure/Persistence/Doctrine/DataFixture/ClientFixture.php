<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMkt\Domain\Entity\Client;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ClientFixture implements FixtureInterface
{
	/**
	 * Load data fixtures with the passed EntityManager
	 * @param  ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$client = new Client();
		$client->setName('João Pedro')
			->setEmail('joaopedrodslv@gmail.com')
			->setCpf('99999999999')
			;
		$manager->persist($client);
		$manager->flush();
	}
}
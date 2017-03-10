<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMkt\Domain\Entity\Client;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

/**
 * Extende de AbstractFixture para ter o addReference
 */
class ClientFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
	/**
	 * Load data fixtures with the passed EntityManager
	 * @param  ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$faker = Faker::create();

		foreach (range(1,4) as $key) {
			$client = new Client();
			$client->setName($faker->firstName . ' ' . $faker->lastName)
				->setEmail($faker->email)
				->setCpf($faker->randomNumber(5))
				;
			$manager->persist($client);
			$this->addReference("client-$key", $client);
		}

		$client = new Client();
		$client->setName($faker->firstName . ' ' . $faker->lastName)
			->setEmail('joaopedrodslv@gmail.com')
			->setCpf($faker->randomNumber(5))
			;
		$manager->persist($client);
		$this->addReference("client-5", $client);

		$manager->flush();
	}

	/**
     * Get the order of this fixture
     * 
     * @return integer
     */
	public function getOrder()
	{
		return 100;
	}
}
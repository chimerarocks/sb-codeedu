<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMkt\Domain\Entity\Client;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class ClientFixture implements FixtureInterface
{
	/**
	 * Load data fixtures with the passed EntityManager
	 * @param  ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$faker = Faker::create();

		foreach (range(1,100) as $value) {
			$client = new Client();
			$client->setName($faker->firstName . ' ' . $faker->lastName)
				->setEmail($faker->email)
				->setCpf($faker->randomNumber(5))
				;
			$manager->persist($client);
		}

		$manager->flush();
	}
}
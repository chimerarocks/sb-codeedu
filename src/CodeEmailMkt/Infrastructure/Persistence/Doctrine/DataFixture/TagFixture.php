<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMkt\Domain\Entity\Client;
use CodeEmailMkt\Domain\Entity\Tag;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

class TagFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
	/**
	 * Load data fixtures with the passed EntityManager
	 * @param  ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$faker = Faker::create();

		foreach (range(1,100) as $value) {
			$tag = new Tag();
			$tag->setName($faker->city);
			$this->addClients($tag);
			$manager->persist($tag);
		}

		$manager->flush();
	}

	/**
     * Get the order of this fixture
     * 
     * @return integer
     */
	public function getOrder()
	{
		return 200;
	}

	public function addClients(Tag $tag)
	{
		$numClients = rand(1,5);
		foreach (range(1, $numClients) as $value) {
			$index = rand(0,99);
			$client = $this->getReference("client-$index");
			if ($this->checkAlreadyExistsOnTag($tag, $client)) {
				$index = rand(0,99);
				$client = $this->getReference("client-$index");
			}
			$tag->getClients()->add($client);
		}
	}

	public function checkAlreadyExistsOnTag(Tag $tag, Client $client): bool
	{
		$exists = $tag->getClients()->exists(function($key, $item) use ($client) {
				return $client->getId() == $item->getId();
		});
		return $exists;
	}
}
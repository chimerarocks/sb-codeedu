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

		foreach (range(1,20) as $value) {
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
		$indexesClients = array_rand(range(1,4), rand(2,4));
		
		// die(print_r(rand(2,5), true));
		// die(print_r(range(1,4), true));
		die(print_r($indexesClients, true));
		foreach ($indexesClients as $key => $value) {
			$client = $this->getReference("client-$value");
			$tag->getClients()->add($client);
		}
	}

	public function addCampaigns(Tag $tag)
	{
		$indexesCampaings = array_rand(range(1,4), rand(2,4));
		foreach ($indexesCampaings as $value) {
			$campaign = $this->getReference("campaign-$value");
			if ($campaign->addTags()->count() < 2) {
				$campaign->getTags()->add($tag);
				$tag->getCampaigns()->add($campaign);
			}
		}
	}
}
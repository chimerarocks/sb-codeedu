<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\DataFixture;

use CodeEmailMkt\Domain\Entity\Campaign;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory as Faker;

/**
 * Extende de AbstractFixture para ter o addReference
 */
class CampaignFixture extends AbstractFixture implements FixtureInterface, OrderedFixtureInterface
{
	/**
	 * Load data fixtures with the passed EntityManager
	 * @param  ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$faker = Faker::create();

		foreach (range(1,100) as $key => $value) {
			$campaign = new Campaign();
			$campaign
				->setName($faker->country)
				->setTemplate('')
				->setSubject($faker->sentence(3))
				;
			$manager->persist($campaign);
			$this->addReference("campaign-$key", $campaign);
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
		return 100;
	}
}
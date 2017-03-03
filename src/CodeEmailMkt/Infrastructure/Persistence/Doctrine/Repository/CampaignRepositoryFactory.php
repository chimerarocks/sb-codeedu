<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use CodeEmailMkt\Domain\Entity\Campaign;

class CampaignRepositoryFactory
{
    public function __invoke(ContainerInterface $container): CampaignRepository
    {
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Campaign::class);
    }
}
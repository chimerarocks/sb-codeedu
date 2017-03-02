<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use CodeEmailMkt\Domain\Entity\Client;

class ClientRepositoryFactory
{
    public function __invoke(ContainerInterface $container): ClientRepository
    {
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Client::class);
    }
}
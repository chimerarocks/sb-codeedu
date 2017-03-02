<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use CodeEmailMkt\Domain\Entity\Address;

class AddressRepositoryFactory
{
    public function __invoke(ContainerInterface $container): AddressRepository
    {
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Address::class);
    }
}
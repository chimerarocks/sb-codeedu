<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\EntityManager;
use Interop\Container\ContainerInterface;
use CodeEmailMkt\Domain\Entity\Tag;

class TagRepositoryFactory
{
    public function __invoke(ContainerInterface $container): TagRepository
    {
        $entityManager = $container->get(EntityManager::class);
        return $entityManager->getRepository(Tag::class);
    }
}
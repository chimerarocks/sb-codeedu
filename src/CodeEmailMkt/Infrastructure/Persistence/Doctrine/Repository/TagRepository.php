<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Repository\TagRepositoryInterface;
use CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\QueryBuilderTrait;
use CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\RepositoryBaseTrait;
use CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\RepositoryCriteriaTrait;
use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository implements TagRepositoryInterface
{
    use RepositoryBaseTrait, QueryBuilderTrait, RepositoryCriteriaTrait;
}
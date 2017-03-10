<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Repository\TagRepositoryInterface;
use CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\QueryBuilderTrait;
use Doctrine\ORM\EntityRepository;

class TagRepository extends EntityRepository implements TagRepositoryInterface
{
    use RepositoryBaseTrait, QueryBuilderTrait;
}
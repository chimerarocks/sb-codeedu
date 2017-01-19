<?php
namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository implements ClientRepositoryInterface
{
    use RepositoryBaseTrait;
}
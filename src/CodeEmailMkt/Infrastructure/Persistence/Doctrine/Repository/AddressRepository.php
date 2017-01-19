<?php
namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Repository\AddressRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class AddressRepository extends EntityRepository implements AddressRepositoryInterface
{
    use RepositoryBaseTrait;    
}
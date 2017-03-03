<?php
namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Repository\CampaignRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class CampaignRepository extends EntityRepository implements CampaignRepositoryInterface
{
    use RepositoryBaseTrait;
}
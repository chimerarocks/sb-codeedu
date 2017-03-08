<?php
namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Entity\Tag;
use CodeEmailMkt\Domain\Repository\ClientRepositoryInterface;
use Doctrine\ORM\EntityRepository;

class ClientRepository extends EntityRepository implements ClientRepositoryInterface
{
    use RepositoryBaseTrait;

	public function findByTags(array $tags): array
	{
		$qb = $this->createQueryBuilder('c')
			->distinct()
			->leftJoin(Tag::class, 't')
			->andWhere('t.id IN (:tag_ids)')
			->setParameter('tag_ids', $tags)
			;

		return $qb->getQuery()->getResult();
	}
}
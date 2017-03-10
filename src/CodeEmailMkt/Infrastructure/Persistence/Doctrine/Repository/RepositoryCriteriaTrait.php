<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use CodeEmailMkt\Domain\Repository\CriteriaInterface;

trait RepositoryCriteriaTrait
{
	protected $criterias;

	public $ALIAS_ENTITY = 'entity';

	public function addCriteria(CriteriaInterface $criteria)
	{
		$this->criterias[] = $criteria;
	}

	public function setCriterias(array $criterias)
	{
		$this->criterias = $criterias;
	}

	public function findWithCriteria()
	{
		$this->queryBuilder = $this->createQueryBuilder($this->ALIAS_ENTITY);
		foreach ($this->criterias as $criteria) {
			$criteria->apply($this);
		}
		return $this->queryBuilder->getQuery()->getResult();
	}
}
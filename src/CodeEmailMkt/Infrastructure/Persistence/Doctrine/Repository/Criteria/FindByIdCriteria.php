<?php
declare(strict_types=1);

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\Criteria;

use CodeEmailMkt\Domain\Repository\Criteria\FindByIdCriteriaInterface;
use CodeEmailMkt\Domain\Repository\RepositoryCriteriaInterface;

class FindByIdCriteria implements FindByIdCriteriaInterface
{
	private $id;

	public function apply(RepositoryCriteriaInterface $repository)
	{
		$alias = $repository->ALIAS_ENTITY;
		$queryBuilder = $repository->getQueryBuilder();
		$queryBuilder->andWhere("$alias.id = :id");
	}

	public function setId(string $id)
	{
		$this->id = $id;
	}

	public function getId(): string
	{
		$this->id;
	}
}
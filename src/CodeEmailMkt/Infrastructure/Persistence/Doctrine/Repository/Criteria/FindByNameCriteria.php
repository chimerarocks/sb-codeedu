<?php
declare(strict_types=1);

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository\Criteria;

class FindByNameCriteria
{
	private $name;

	public function apply(RepositoryCriteriaInterface $repository)
	{
		$alias = $repository->ALIAS_ENTITY;
		$queryBuilder = $repository->getQueryBuilder();
		$queryBuilder->andWhere("$alias.name = :name");
	}

	public function setName(string $name)
	{
		$this->name = $name;
	}

	public function getName(): string
	{
		$this->name;
	}
}
<?php

namespace CodeEmailMkt\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\ORM\QueryBuilder;

trait QueryBuilderTrait
{
	protected $queryBuilder;

	public function getQueryBuilder(): QueryBuilder
	{
		return $this->queryBuilder;
	}

	public function setQueryBuilder(QueryBuilder $queryBuilder)
	{
		$this->queryBuilder = $queryBuilder;
	}
}
<?php

namespace CodeEmailMkt\Domain\Repository;

interface RepositoryCriteriaInterface
{
	public function addCriteria(CriteriaInterface $criteria);

	public function setCriterias(array $criteria);

	public function findWithCriteria();

	public function setQueryBuilder($queryBuilder);

	public function getQueryBuilder();
}
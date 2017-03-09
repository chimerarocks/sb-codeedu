<?php

namespace CodeEmailMkt\Domain\Repository;

interface CriteriaInterface
{
	public function apply(RepositoryCriteriaInterface $repository);
}
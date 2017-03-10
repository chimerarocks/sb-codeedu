<?php
declare(strict_types=1);

namespace CodeEmailMkt\Domain\Repository\Criteria;

use CodeEmailMkt\Domain\Repository\CriteriaInterface;

interface FindByNameCriteriaInterface implements CriteriaInterface
{
	public function setName(string $name);

	public function getName(): string;
}
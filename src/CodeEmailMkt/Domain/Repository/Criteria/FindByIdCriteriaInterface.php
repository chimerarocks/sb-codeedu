<?php
declare(strict_types=1);

namespace CodeEmailMkt\Domain\Repository\Criteria;

use CodeEmailMkt\Domain\Repository\CriteriaInterface;

interface FindByIdCriteriaInterface extends CriteriaInterface
{
	public function setId(string $id);

	public function getId(): string;
}
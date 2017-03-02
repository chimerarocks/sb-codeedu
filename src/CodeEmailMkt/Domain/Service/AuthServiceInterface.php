<?php
declare(strict_types = 1);

namespace CodeEmailMkt\Domain\Service;

use CodeEmailMkt\Domain\Entity\User;

interface AuthServiceInterface
{
	public function authenticate(string $email, string $password): bool;

	public function isAuth(): bool;

	public function getUser(): User;

	public function destroy();
}
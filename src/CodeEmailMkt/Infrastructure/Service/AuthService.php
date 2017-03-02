<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Entity\User;
use CodeEmailMkt\Domain\Service\AuthServiceInterface;
use Zend\Authentication\AuthenticationService;

class AuthService implements AuthServiceInterface
{
	private $authenticationService;

	public function __construct(AuthenticationService $authenticationService)
	{
		$this->authenticationService = $authenticationService;
	}

	public function authenticate(string $email, string $password): bool
	{
		$adapter = $this->authenticationService->getAdapter();
		$adapter->setIdentity($email);
		$adapter->setCredential($password);
		$result = $this->authenticationService->authenticate();	
		return $result->isValid();
	}

	public function isAuth(): bool
	{
		return $this->getUser() != null;
	}

	public function getUser(): User
	{
		return $this->authenticationService->getIdentity();
	}

	public function destroy()
	{
		$this->authenticationService->clearIdentity();
	}
}
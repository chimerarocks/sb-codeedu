<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Domain\Service\AuthServiceInterface;
use Zend\Authentication\AuthenticationService;

class AuthService implements AuthServiceInterface
{
	private $authenticationService;

	public function __construct(AuthenticationService $authenticationService)
	{
		$this->authenticationService = $authenticationService;
	}

	public function authenticate($email, $password)
	{
		$adapter = $this->authenticationService->getAdapter();
		$adapter->setIdentity($email);
		$adapter->setCredential($password);
		$result = $this->authenticationService->authenticate();	
		return $result->isValid();
	}

	public function isAuth()
	{
		throw new \Exception('Method not implemented');
	}

	public function getUser()
	{
		throw new \Exception('Method not implemented');
	}

	public function destroy()
	{
		$this->authenticationService->clearIdentity();
	}
}
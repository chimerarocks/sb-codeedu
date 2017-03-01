<?php

namespace CodeEmailMkt\Infrastructure\Service;

use CodeEmailMkt\Infrastructure\Service\AuthService;
use Interop\Container\ContainerInterface;
use Zend\Authentication\AuthenticationService;

class AuthServiceFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$authenticationService = $container->get(AuthenticationService::class);
		return new AuthService($authenticationService);
	}
}
<?php

namespace CodeEmailMkt\Application\Middleware;

use CodeEmailMkt\Application\Middleware\AuthenticationMiddleware;
use CodeEmailMkt\Domain\Service\AuthServiceInterface;
use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;

class AuthenticationMiddlewareFactory
{
	public function __invoke(ContainerInterface $container)
	{
		$router = $container->get(RouterInterface::class);
		$authService = $container->get(AuthServiceInterface::class);
		return new AuthenticationMiddleware($router, $authService);
	}
}